<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'brands' => Brand::all(),
            'categories' => Category::all()
        ];
        return view('pages.main.home.index', $data);
    }
}
