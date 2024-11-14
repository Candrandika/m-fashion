<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use UploadTrait;

    public function index()
    {
        return view('pages.admin.brands.index');
    }

    public function store(BrandRequest $request){
        $data = $request->validated();

        try{
            if (isset($data['image'])) {
                $data["image"] = $this->upload('brands', $request->file('image'));
            } else {
                $data["image"] = null;
            }
    
            Brand::create($data);
    
            return redirect()->back()->with('success', 'Berhasil menambahkan data brand');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    
    public function update(BrandRequest $request, Brand $brand){
        $data = $request->validated();
        try{
            if (isset($data['image'])) {
                $data["image"] = $this->upload('brands', $request->file('image'));
            }
    
            $brand->update($data);
    
            return redirect()->back()->with('success', 'Berhasil menambahkan data brand');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Brand $brand){
        try{
            $brand->update(["is_delete" => 1]);
    
            return redirect()->back()->with('success', 'Berhasil menambahkan data brand');
        }catch(\Throwable $th){
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function dataTable()
    {
        $data = Brand::where('is_delete', 0)->get();
        return BaseDatatable::TableV2($data->toArray());
    }
}
