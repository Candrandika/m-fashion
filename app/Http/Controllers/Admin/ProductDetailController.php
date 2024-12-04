<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDetailRequest;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\Warna;
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

        $check = ProductDetail::where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('warna_id', $request->warna_id)->first();
        if($check) return redirect()->back()->with('error','Data sudah ditambahkan, silahkan masukkan data yang berbeda!');

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
        $sizes = Size::where('product_id', $productDetail->product_id)->get();
        $colors = Warna::where('product_id', $productDetail->product_id)->get();
        return view('pages.admin.productDetails.show', compact('sizes','colors'));
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

        $check = ProductDetail::where('product_id', $request->product_id)->where('size_id', $request->size_id)->where('warna_id', $request->warna_id)->first();
        if($check && $check?->id != $productDetail->id) return redirect()->back()->with('error','Data sudah ditambahkan, silahkan masukkan data yang berbeda!');

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
        $data = ProductDetail::with('size','color')->where('product_details.is_delete',0)->where('product_details.product_id', $request->product_id);

        return BaseDatatable::Table($data);
    }

    public function addImage(Request $request){
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,mp4,mkv,mov'
        ]);

        $mimes = $request->file('image')->getMimeType();
        if(str_contains($mimes, "image")) $type = "image";
        else $type = "video";

        if($type == "image" && $request->file('image')->getSize() > 2 * 1024 * 1024){
            return redirect()->back()->with('error','File Image yang di isi tidak boleh lebih dari 2mb!');
        } 

        if($type == "video" && $request->file('image')->getSize() > 15 * 1024 * 1024){
            return redirect()->back()->with('error','File Video yang di isi tidak boleh lebih dari 15mb!');
        } 

        $check_data = ProductImage::where('type','video')->where('product_id', $request->product_id)->first();
        if($check_data && $type == "video") return redirect()->back()->with('error','Hanya boleh upload 1 video dalam 1 produk!');

        $image = null;        
        if ($request->hasFile('image')) {
            $image = $this->upload('product_image/'.$request->product_id, $request->file('image'));
        }
        if(!$image) return redirect()->back()->with('error','Gambar tidak dapat dilakukan!');

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
