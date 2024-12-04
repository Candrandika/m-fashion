<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::withSum('details','sold')->where('is_delete',0)->orderBy('details_sum_sold', 'DESC')->limit(3)->get();
        $data = [
            'brands' => Brand::where('is_delete',0)->get(),
            'categories' => Category::where('is_delete',0)->get(),
            'products' => $product
        ];
        return view('pages.main.home.index', $data);
    }
}
