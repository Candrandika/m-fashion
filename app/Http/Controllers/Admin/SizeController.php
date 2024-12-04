<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use App\Models\ProductDetail;
use App\Models\Size;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    use UploadTrait;

    public function index()
    {
        
    }

    public function store(SizeRequest $request)
    {
        $data = $request->validated();

        try {
            Size::create($data);

            return redirect()->back()->with('success', 'Berhasil menambahkan data ukuran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }


    public function update(SizeRequest $request, Size $size)
    {
        $data = $request->validated();
        try {

            $size->update($data);

            return redirect()->back()->with('success', 'Berhasil update data ukuran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function destroy(Size $size)
    {
        $product_details = ProductDetail::where('size_id', $size->id)->where('is_delete', 0)->get();
        if(count($product_details) > 0) return redirect()->back()->with('error','Tidak dapat menghapus data ini karena masih digunakan!');

        try {
            $size->update(["is_delete" => 1]);

            return redirect()->back()->with('success', 'Berhasil mengahapus data ukuran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function dataTable(Request $request)
    {
        $data = Size::where('product_id', $request->product_id)->where('is_delete', 0)->get();
        return BaseDatatable::TableV2($data->toArray());
    }
}
