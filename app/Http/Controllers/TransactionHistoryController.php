<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        $transaction = Transaction::where('user_id',Auth::user()->id)->get();
        return view('pages.main.transaction-history.index', compact('transaction'));
    }

    public function show(string $id)
    {
        $transaction = Transaction::where('user_id',Auth::user()->id)->where('id', $id)->firstOrFail();
        $customer_detail = (object)json_decode($transaction->customer_details);
        $item_details = json_decode($transaction->item_details);
        
        return view('pages.main.transaction-history.detail', compact('transaction', 'item_details', 'customer_detail'));
    }

    public function update(Request $request, string $id){
        $transaction = Transaction::where('user_id',Auth::user()->id)->where('id', $id)->first();
        if(!$transaction) return redirect()->back()->with('error','Tidak ditemukan data transaksi');

        if($request->status == "accepted"){
            $status = "COMPLETED";
        } else if($request->status == "rejected") {
            $status = "CANCELED";
            
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
        } else {
            return redirect()->back()->with('error', 'Tidak dapat mengubah transaksi selain diterima / dibatalkan!');
        }

        $transaction->update(["status" => $status]);
        return redirect()->back()->with('success','Berhasil mengubah status transaksi anda!');
    }
}
