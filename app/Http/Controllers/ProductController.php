<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::query();

        if($request->search) {
            $products->where('name', 'like', '%'.$request->search.'%')
                ->orWhereHas('category', function($q) use($request) {
                    $q->where('name', 'like', '%'.$request->search.'%');
                })->orWhereHas('brand', function($q) use($request) {
                    $q->where('name', 'like', '%'.$request->search.'%');
                });
        }

        $products->orderBy('name', 'asc');
        $products = $products->paginate(12)->withQueryString();

        return view('pages.main.products.index', [
            'products' => $products
        ]);
    }

    public function show(Request $request, Product $product): View
    {
        $product = Product::where('id',$product->id)->with(['brand', 'category', 'details', 'product_images', 'sizes.colors', 'colors.sizes', 'favorite', 'colors.product_details.size'])->first();
        
        return view('pages.main.products.show', [
            'product' => $product
        ]);
    }
}
