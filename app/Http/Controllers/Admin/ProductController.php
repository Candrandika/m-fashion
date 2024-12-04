<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\Warna;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::where('is_delete', 0)->get();
        $brand = Brand::where('is_delete', 0)->get();
        return view('pages.admin.products.index', compact('category', 'brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('is_delete', 0)->get();
        $brand = Brand::where('is_delete', 0)->get();
        return view('pages.admin.products.create', compact('brand', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        try {
            if (isset($data['image'])) {
                $data["image"] = $this->upload('products', $request->file('image'));
            } else {
                $data["image"] = null;
            }

            Product::create($data);

            return redirect()->route('admin.products.index')->with('success', 'Berhasil menambahkan data produk');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $product = Product::with('category', 'brand')->where('id', $id)->first();
        $sizes = Size::where('product_id', $id)->where('is_delete',0)->get();
        $colors = Warna::where('product_id', $id)->where('is_delete',0)->get();
        return view('pages.admin.products.show', compact('product', 'sizes', 'colors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::where('is_delete', 0)->get();
        $brand = Brand::where('is_delete', 0)->get();
        return view('pages.admin.products.edit', compact('product', 'brand', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        try {
            if (isset($data['image'])) {
                if($product->image){
                    $this->remove($product->image);
                }

                $data["image"] = $this->upload('products', $request->file('image'));
            }
            

            $product->update($data);

            return redirect()->route('admin.products.index')->with('success', 'Berhasil mengubah data produk');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            if($product->image){
                $this->remove($product->image);
            }

            $product->update(["is_delete" => 1, 'image' => null]);

            return redirect()->back()->with('success', 'Berhasil menghapus produk');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function dataTable(Request $request)
    {
        $data = Product::with('brand','category','details')->where('is_delete', 0);

        return BaseDatatable::Table($data);
    }
}
