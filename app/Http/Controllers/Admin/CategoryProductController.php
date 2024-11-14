<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index()
    {
        return view('pages.admin.product-categories.index');
    }

    public function store(CategoryRequest $request){
        $data = $request->validated();

        try{
            Category::create($data);
    
            return redirect()->back()->with('success', 'Berhasil menambahkan data brand');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    
    public function update(CategoryRequest $request, Category $brand){
        $data = $request->validated();
        try{

            $brand->update($data);
    
            return redirect()->back()->with('success', 'Berhasil menambahkan data brand');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Category $brand){
        try{
            $brand->update(["is_delete" => 1]);
    
            return redirect()->back()->with('success', 'Berhasil menambahkan data brand');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function dataTable()
    {
        $data = Category::where('is_delete', 0)->get();
        return BaseDatatable::TableV2($data->toArray());
    }
}
