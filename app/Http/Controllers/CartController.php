<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\TempCheckout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::with('product_detail.product','product_detail.size','product_detail.color','user')->where('user_id', Auth::user()?->id)->get();
        return view('pages.main.cart.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartRequest $request)
    {
        $data = $request->validated();

        try {
            $check = Cart::where('product_detail_id', $request->product_detail_id)->where('user_id', Auth::user()->id)->first();
            if($check){
                $check->total += 1;
                $check->save();
            }else {
                Cart::create($data);
            }
    
            return redirect()->back()->with('success','Berhasil menambahkan produk ke keranjang!');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CartRequest $request, Cart $cart)
    {
        $data = $request->validated();

        try {
            $cart->update($data);
    
            return redirect()->back()->with('success','Berhasil mengubah produk di keranjang!');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::find($id);
        if(!$cart) return redirect()->back()->with('error','Tidak ditemukan data produk keranjang!');

        try {
            $cart->delete();
    
            return redirect()->back()->with('success','Berhasil menghapus produk dari keranjang!');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function checkout(Request $request)
    {
        if($request->product_json == "[]") return redirect()->back()->with('error', 'Pilih terlebih dahulu barang yang ingin di checkout!');

        try{
            TempCheckout::where('user_id', Auth::user()->id)->delete();

            TempCheckout::create([
                "user_id" => Auth::user()->id,
                'data' => $request->product_json
            ]);
    
            return redirect()->route('display.checkout')->with('success', 'Melakukan proses checkout!');
        }catch(\Throwable $th) {
            return redirect()->back()->withError($th->getMessage());
        }
    }
}
