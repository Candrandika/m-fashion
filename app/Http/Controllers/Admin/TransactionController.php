<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Cart;
use App\Models\TempCheckout;
use App\Models\Transaction;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = Transaction::when(Auth::user()->hasRole('user'), function($q){
            $q->where('user_id', Auth::user()->id);
        });

        return BaseDatatable::Table($data);
    }

    public function create()
    {
        $data = TempCheckout::where('user_id', Auth::user()->id)->first();
        if(!$data) return redirect()->back()->with('error', 'Anda tidak memiliki barang yang di checkout!');

        $temp = json_decode($data->data, true);
        $ids = array_column($temp, 'id');
        $total_price = 0;
        
        $cart = Cart::with('product_detail.product','product_detail.size','product_detail.color')->whereIn('id',$ids)->get();
        return view('pages.main.checkout.index', compact('temp', 'cart', 'total_price'));
    }

    public function store(TransactionRequest $request)
    {
        $data = $request->validated();
        
        try{
            $token = $this->midtransService->transaction([
                "transaction_details" => [
                    "order_id" => $data["order_id"],
                    "gross_amount" => $data["price"]
                ],
                "customer_details" => $data["customer_details"],
                "item_details" => $data["item_details"],
            ]);

            $data["snap_token"] = $token;
            $data["customer_details"] = json_encode($data["customer_details"]);
            $data["item_details"] = json_encode($data["item_details"]);

            Transaction::create($data);
            return response()->json(["message" => "Berhasil melakukan proses transaksi", "is_success" => true, "snap_token" => $token])->setStatusCode(200);
        }catch(\Throwable $th){
            return response()->json(["message" => $th->getMessage(), "is_success" => false])->setStatusCode(500);
        }
    }
}
