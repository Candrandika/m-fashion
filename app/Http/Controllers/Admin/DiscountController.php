<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.admin.discounts.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountRequest $request)
    {
        $data = $request->validated();

        try {
            if (isset($data['image'])) {
                $data["image"] = $this->upload('discounts', $request->file('image'));
            } else {
                $data["image"] = null;
            }

            Discount::create($data);

            return redirect()->back()->with('success', 'Berhasil menambahkan data diskon');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountRequest $request, Discount $discount)
    {
        $data = $request->validated();

        try {
            if (isset($data['image'])) {
                if($discount->image){
                    $this->remove($discount->image);
                }
                
                $data["image"] = $this->upload('discounts', $request->file('image'));
            }

            $discount->update($data);

            return redirect()->back()->with('success', 'Berhasil mengubah data diskon');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        try {
            if($discount->image){
                $this->remove($discount->image);
            }

            $discount->update(["is_delete" => 1, 'image' => null]);

            return redirect()->back()->with('success', 'Berhasil menghapus diskon');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function dataTable(Request $request)
    {
        $data = Discount::with('product')->where('is_delete', 0);

        return BaseDatatable::Table($data);
    }
}
