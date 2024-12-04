<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorite = Favorite::with('product','user')->where('user_id', Auth::user()?->id)->get();
        return view('pages.main.favorites.index', compact('favorite'));
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
    public function store(Request $request)
    {
        $request->merge(["user_id" => Auth::user()->id]);

        $data = $request->validate([
            'product_id' => 'required',
            'user_id' => 'required'
        ], [
            'product_id.required' => 'Produk harus di isi!',
            'user_id.required' => 'User harus di isi!',
        ]);

        try {
            Favorite::create($data);
    
            return redirect()->back()->with('success','Berhasil menambahkan produk ke favorit!');
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
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $favorite = Favorite::find($id);
        if(!$favorite) return redirect()->back()->with('error','Tidak ditemukan data favorite!');

        try {
            $favorite->delete();
    
            return redirect()->back()->with('success','Berhasil menghapus produk dari favorit!');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
