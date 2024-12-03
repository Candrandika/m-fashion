<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category): View
    {
        $products = Product::where('category_id', $category->id)->paginate(12);

        return view('pages.main.categories.show', [
            'category' => $category,
            'products' => $products,
        ]);
    }
}
