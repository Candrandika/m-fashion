<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\TempCheckout;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
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
        
        $cart = Cart::whereIn('id',$ids)->get();
        return view('pages.main.checkout.index', compact('temp', 'cart'));
    }
}
