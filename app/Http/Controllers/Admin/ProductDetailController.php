<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDetailRequest;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(ProductDetailRequest $request)
    {
        $data = $request->validated();

        try{
            ProductDetail::create($data);
    
            return redirect()->back()->with('success', 'Berhasil menambahkan data detail produk');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductDetail $productDetail)
    {
        return view('pages.admin.productDetails.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductDetailRequest $request, ProductDetail $productDetail)
    {
        $data = $request->validated();

        try{
            $productDetail->update($data);
    
            return redirect()->back()->with('success', 'Berhasil mengubah data detail produk');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductDetail $productDetail)
    {
        try{
            $productDetail->update(["is_delete" => 1]);
    
            return redirect()->back()->with('success', 'Berhasil menghapus detail produk');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function dataTable(Request $request) {
        $data = ProductDetail::where('is_delete',0)->where('product_id', $request->product_id);

        return BaseDatatable::Table($data);
    }

    public function addImage(Request $request){
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,mp4,mkv,mov'
        ]);

        if ($request->hasFile('image')) {
            $image = $this->upload('product_image/'.$request->product_id, $request->file('image'));
        } else {
            $image = null;
        }

        $mimes = $request->file('image')->getMimeType();
        if(str_contains($mimes, "image")) $type = "image";
        else $type = "video";

        $check_data = ProductImage::where('type','video')->where('product_id', $request->product_id)->first();
        if($check_data && $type == "video") return redirect()->back()->with('error','Hanya boleh upload 1 video dalam 1 produk!');

        ProductImage::create([
            'product_id' => $request->product_id,
            'image' => $image,
            "type" => $type
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan gambar produk');
    }

    public function deleteImage(Request $request, ProductImage $productImage){
        if ($productImage->image) {
            $this->remove('product_image/'.$productImage->product_id, $productImage->image);
        }

        $productImage->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus gambar produk');
    }
}
