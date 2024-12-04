<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\ProductDetail;
use App\Models\Warna;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class WarnaController extends Controller
{
    use UploadTrait;

    public function index()
    {
        
    }

    public function store(ColorRequest $request)
    {
        $data = $request->validated();

        try {
            if (isset($data['image'])) {
                $data["image"] = $this->upload('colors', $request->file('image'));
            } else {
                $data["image"] = null;
            }

            Warna::create($data);

            return redirect()->back()->with('success', 'Berhasil menambahkan data warna');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }


    public function update(ColorRequest $request, string $id)
    {
        $data = $request->validated();

        $warna = Warna::find($id);
        if(!$warna) return redirect()->back()->with('error','Data warna tidak ditemukan!');

        try {
            if (isset($data['image'])) {
                if($warna->image){
                    $this->remove($warna->image);
                }

                $data["image"] = $this->upload('colors', $request->file('image'));
            }

            $warna->update($data);

            return redirect()->back()->with('success', 'Berhasil update data warna');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    public function destroy(string $id)
    {
        $warna = Warna::find($id);
        if(!$warna) return redirect()->back()->with('error','Data warna tidak ditemukan!');

        $product_details = ProductDetail::where('warna_id', $id)->where('is_delete', 0)->get();
        if(count($product_details) > 0) return redirect()->back()->with('error','Tidak dapat menghapus data ini karena masih digunakan!');

        try {
            if($warna->image){
                $this->remove($warna->image);
            }

            $warna->update(["is_delete" => 1]);

            return redirect()->back()->with('success', 'Berhasil menghapus data warna');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function dataTable(Request $request)
    {
        $data = Warna::where('product_id', $request->product_id)->where('is_delete', 0)->get();
        return BaseDatatable::TableV2($data->toArray());
    }
}
