<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    use UploadTrait;

    public function index()
    {
        return view('pages.admin.product-categories.index');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        try {
            if (isset($data['image'])) {
                $data["image"] = $this->upload('categories', $request->file('image'));
            } else {
                $data["image"] = null;
            }

            Category::create($data);

            return redirect()->back()->with('success', 'Berhasil menambahkan data category');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            
            $category = Category::find($id);
            if(!$category) return redirect()->back()->with('error','Tidak dapat menemukan data category!');

            if (isset($data['image'])) {
                if($category->image){
                    $this->remove($category->image);
                }

                $data["image"] = $this->upload('categories', $request->file('image'));
            }
            $category->update($data);

            return redirect()->back()->with('success', 'Berhasil mengedit data category');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $category = Category::find($id);
            if(!$category) return redirect()->back()->with('error','Tidak dapat menemukan data category!');

            if($category->image){
                $this->remove($category->image);
            }

            $category->update(["is_delete" => 1, 'image' => null]);

            return redirect()->back()->with('success', 'Berhasil menghapus data category');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function dataTable()
    {
        $data = Category::withCount('products')->where('is_delete', 0)->get();
        return BaseDatatable::TableV2($data->toArray());
    }
}
