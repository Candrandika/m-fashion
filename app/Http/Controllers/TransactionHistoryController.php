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

        $transaction->update(["status" => "COMPLETE"]);
        return redirect()->back()->with('success','Berhasil mengubah status transaksi anda!');
    }
}
