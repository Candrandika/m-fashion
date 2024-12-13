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
        });

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
                    
                }
                $cart->delete();
            }

            if($request->method_type == "manual"){
                $transaksi->update([
                    "transaction_id" => "-",
                    "status" => "WAITING_ACCEPTION",
                    "payment_method" => "manual",
                    "va_payment" => null,
                    "paid_timestamps" => Carbon::now()
                ]);
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
        $url = $request->fullUrl();
        if(str_contains($url, 'midtrans')){
            $result = $request;
        }

        $transaksi = Transaction::where('user_id', Auth::user()?->id)->where('status','PENDING')->first();
        if(!$transaksi && isset($result->transaction_id)) {
            $transaksi = Transaction::where('order_id', $result->order_id)->where('status','PENDING')->first();
        }
        if(!$transaksi && !str_contains($url, 'midtrans')) return redirect()->back()->with('error', 'Tidak ditemukan untuk transaksi anda, silahkan cek kembali kedalam riwayat pembelanjaan!');
        if(!$transaksi && str_contains($url, 'midtrans')) return response()->json(['Tidak ditemukan untuk transaksi anda, silahkan cek kembali kedalam riwayat pembelanjaan!'])->setStatusCode(404);

        $invalid_status = ['deny','cancel','expired','failure']; 
        $success_status = ['capture','settlement','success','done'];

        DB::beginTransaction();
        try{
            if(isset($result->transaction_status) && in_array($result->transaction_status, $success_status)){
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
    
                    $detail->sold += $stock["quantity"];
                    $detail->stock -= $stock["quantity"];
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
                if(str_contains($url, 'midtrans')) return response()->json(["message" => "Transaksi telah dilakukan, silahkan cek transaksi anda di riwayat transaksi", "success" => true])->setStatusCode(200);
                return redirect()->route('transaction-history')->with('success', 'Transaksi telah dilakukan, silahkan cek transaksi anda di riwayat transaksi!');
            }
            else if(isset($result->transaction_status) && in_array($result->transaction_status, $invalid_status)){
                $status = "FAILED";
                switch($result->transaction_status) {
                    case 'expire':
                        $status = "EXPIRED";
                        break;
                    case 'failure':
                        $status = "FAILED";
                        break;
                    case 'cancel':
                        $status = "CANCELED";
                        break;
                    case 'deny':
                        $status = "REJECTED";
                        break;
                }

                $transaksi->update(["status" => $status]);
            
                DB::commit();
                if(str_contains($url, 'midtrans')) return response()->json(["message" => "Transaksi telah kadaluarsa, silahkan cek transaksi anda di riwayat transaksi!", "success" => true])->setStatusCode(200);
                return redirect()->route('transaction-history')->with('success', 'Transaksi telah kadaluarsa, silahkan cek transaksi anda di riwayat transaksi!');
            } else {
                $transaksi->update([
                    "transaction_id" => $result->transaction_id
                ]);

                if(str_contains($url, 'midtrans')) return response()->json(["message" => "Transaksi masih dalam proses!", "success" => true])->setStatusCode(200);
                return redirect()->route('transaction-history.detail', $transaksi->id)->with('success', 'Transaksi telah dibuat!');
            }
        }catch(\Throwable $th){
            DB::rollBack();
            if(str_contains($url, 'midtrans')) return response()->json(["message" => $th->getMessage(), "is_success" => false])->setStatusCode(500);
            return redirect()->route('transaction-history')->withError($th->getMessage());
        }
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
            if($request->statis == "REJECTED" && $transaction->payment_method != "manual") return redirect()->back()->with('error', 'Tidak dapat menolak transaksi karena transaksi ini bukan dilakukan secara manual!');

            if($transaction->payment_method == "manual"){
                $temp = json_decode($transaction->item_details, true);
                $ids = array_column($temp, 'id');
    
                $product_details = ProductDetail::whereIn('id',$ids)->get();
                
                foreach($product_details as $detail) {
                    $stock = collect($temp)
                    ->filter(function ($q) use ($detail) {
                        return $q['id'] == $detail->id;
                    })
                    ->first();
    
                    $detail->sold -= $stock["quantity"];
                    $detail->stock += $stock["quantity"];
                    $detail->save();
                }
            }
    
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
