<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Cart;
use App\Models\ProductDetail;
use App\Models\TempCheckout;
use App\Models\Transaction;
use App\Services\MidtransService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    private MidtransService $midtransService;

    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    public function index()
    {
        return view('pages.admin.transactions.index');
    }

    public function dataTable(Request $request){
        $data = Transaction::with('user')->when(Auth::user()->hasRole('user'), function($q){
            $q->where('user_id', Auth::user()->id);
        })->orderBy('');

        return BaseDatatable::Table($data);
    }

    public function create()
    {
        $data = TempCheckout::where('user_id', Auth::user()->id)->first();
        $transaksi = Transaction::where('user_id', Auth::user()->id)->where('status','PENDING')->first();
        if(!$data) return redirect()->back()->with('error', 'Anda tidak memiliki barang yang di checkout!');
        if($transaksi) return redirect()->back()->with('error', 'Anda masih memiliki tanggungan pembayaran, silahkan selesaikan terlebih dahulu!');

        $temp = json_decode($data->data, true);
        $ids = array_column($temp, 'id');
        $total_price = 0;
        
        $cart = Cart::with('product_detail.product','product_detail.size','product_detail.color')->whereIn('id',$ids)->get();
        return view('pages.main.checkout.index', compact('temp', 'cart', 'total_price'));
    }

    public function store(TransactionRequest $request)
    {
        $data = $request->validated();
        
        DB::beginTransaction();
        try{
            $check_transaksi = Transaction::where('user_id', Auth::user()->id)->where('status', 'PENDING')->first();
            if($check_transaksi) return response()->json(["message" => "Berhasil melakukan proses transaksi", "is_success" => true, "snap_token" => $check_transaksi->snap_token])->setStatusCode(200);

            if($request->method_type == "auto"){
                $token = $this->midtransService->transaction([
                    "transaction_details" => [
                        "order_id" => $data["order_id"],
                        "gross_amount" => $data["price"]
                    ],
                    "customer_details" => $data["customer_details"],
                    "item_details" => $data["item_details"],
                ]);
    
                $data["snap_token"] = $token;
            }

            if($request->method_type == "manual") $data["payment_method"] = "cash";
            $data["customer_details"] = json_encode($data["customer_details"]);
            $data["item_details"] = json_encode($data["item_details"]);

            $transaksi = Transaction::create($data);
            $checkout = TempCheckout::where('user_id', Auth::user()->id)->first();

            $temp = json_decode($checkout->data, true);
            $ids = array_column($temp, 'id');

            $carts = Cart::with('product_detail')->whereIn('id',$ids)->get();
                
            foreach($carts as $cart) {
                if($request->method_type == "manual"){
                    $stock = collect($temp)
                    ->filter(function ($q) use ($cart) {
                        return $q['id'] == $cart->id;
                    })
                    ->first();

                    $cart->product_detail->sold += $stock["qty"];
                    $cart->product_detail->stock -= $stock["qty"];
                    $cart->product_detail->save();
                    
                    $transaksi->update([
                        "transaction_id" => "-",
                        "status" => "WAITING_ACCEPTION",
                        "payment_method" => $request->payment_type,
                        "va_payment" => null,
                        "paid_timestamps" => Carbon::now()
                    ]);
                }
                $cart->delete();
            }

            $checkout->delete();
            
            DB::commit();
            if($request->method_type == "manual") return redirect()->route('transaction-history')->with('success','Berhasil melakukan transaksi COD!');
            return response()->json(["message" => "Berhasil melakukan proses transaksi", "is_success" => true, "snap_token" => $token])->setStatusCode(200);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(["message" => $th->getMessage(), "is_success" => false])->setStatusCode(500);
        }
    }

    public function callback(Request $request)
    {
        $result = json_decode($request->result);
        $transaksi = Transaction::where('user_id', Auth::user()->id)->where('status','PENDING')->first();
        if(!$transaksi && $request->type != "api") return redirect()->back()->with('error', 'Tidak ditemukan untuk transaksi anda, silahkan cek kembali kedalam riwayat pembelanjaan!');
        if(!$transaksi && $request->type == "api") return redirect()->response()->json(['Tidak ditemukan untuk transaksi anda, silahkan cek kembali kedalam riwayat pembelanjaan!']);

        DB::beginTransaction();
        try{
            if(isset($result->transaction_status) && $result->transaction_status != "pending" && $result->transaction_status != "expire"){
                $payment = null;
                if(isset($result->va_numbers)){
                    $payment = json_encode($result->va_numbers);
                }
    
                $temp = json_decode($transaksi->item_details, true);
                $ids = array_column($temp, 'id');
    
                $product_details = ProductDetail::whereIn('id',$ids)->get();
                
                foreach($product_details as $detail) {
                    $stock = collect($temp)
                    ->filter(function ($q) use ($detail) {
                        return $q['id'] == $detail->id;
                    })
                    ->first();
    
                    $detail->sold += $stock->quantity;
                    $detail->stock -= $stock->quantity;
                    $detail->save();
                }
    
                $transaksi->update([
                    "transaction_id" => $result->transaction_id,
                    "status" => "PAID",
                    "payment_method" => $result->payment_type,
                    "va_payment" => $payment,
                    "paid_timestamps" => $result->transaction_time
                ]);
            
                DB::commit();
                return redirect()->route('transaction-history')->with('success', 'Transaksi telah dilakukan, silahkan cek transaksi anda di riwayat transaksi!');
            }
            else if(isset($result->transaction_status) && $result->transaction_status == "expire"){
                $transaksi->update(["status" => "EXPIRED"]);
            
                DB::commit();
                return redirect()->route('transaction-history')->with('success', 'Transaksi telah kadaluarsa, silahkan cek transaksi anda di riwayat transaksi!');
            }
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json(["message" => $th->getMessage(), "is_success" => false])->setStatusCode(500);
        }
        
        return redirect()->back()->with('error', 'Tidak ditemukan untuk transaksi anda, silahkan cek kembali kedalam riwayat pembelanjaan!');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            "status" => 'required'
        ], [
            'status.required' => 'Anda harus memilih status terlebih dahulu'
        ]);

        try {
            if($request->status == "SHIPPING" && !$request->shipping_method) return redirect()->back()->with('error', 'Nama jasa pengiriman harus diisi!');
            if($request->status == "SHIPPING" && !$request->resi) return redirect()->back()->with('error', 'Nomor resi pengiriman harus diisi!');
            
            $transaction = Transaction::find($id);
            if(!$transaction) return redirect()->back()->with('error', 'Data transaksi sudah digunakan!');
    
            $transaction->update([
                "status" => $request->status,
                "shipping_method" => $request->shipping_method,
                "resi" => $request->resi,
            ]);
            return redirect()->back()->with('success', 'Berhasil merubah status transaksi!');
        }catch(\Throwable $th) {
            return redirect()->back()->withError($th->getMessage());
        }
    }
}
