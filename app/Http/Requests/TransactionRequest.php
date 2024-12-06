<?php

namespace App\Http\Requests;

use App\Models\Cart;
use App\Models\TempCheckout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "customer_details" => 'required',
            "item_details" => 'required',
            'customer_details.first_name' => 'required',
            'customer_details.email' => 'required|email',
            'customer_details.phone' => 'required',
            'customer_details.shipping_address' => 'required',
            'customer_details.shipping_address.province' => 'required',
            'customer_details.shipping_address.city' => 'required',
            'customer_details.shipping_address.district' => 'required',
            'customer_details.shipping_address.postal_code' => 'required',
            'customer_details.shipping_address.address' => 'required',
            'order_id' => 'nullable',
            'price' => 'nullable',
            'user_id' => 'required'
        ];
    }

    public function messages() {
        return [
            "customer_details.required" => "Detail pelanggan wajib diisi.",
            "item_details.required" => "Detail item wajib diisi.",
            "customer_details.first_name.required" => "Nama depan pelanggan wajib diisi.",
            "customer_details.email.required" => "Email pelanggan wajib diisi.",
            "customer_details.email.email" => "Email pelanggan harus berformat email.",
            "customer_details.phone.required" => "Nomor telepon pelanggan wajib diisi.",
            "customer_details.shipping_address.required" => "Alamat pengiriman pelanggan wajib diisi.",
            "customer_details.shipping_address.province.required" => "Provinsi alamat pengiriman wajib diisi.",
            "customer_details.shipping_address.city.required" => "Kota alamat pengiriman wajib diisi.",
            "customer_details.shipping_address.district.required" => "Kecamatan alamat pengiriman wajib diisi.",
            "customer_details.shipping_address.postal_code.required" => "Kode pos alamat pengiriman wajib diisi.",
            "customer_details.shipping_address.address.required" => "Alamat lengkap pengiriman wajib diisi.",
        ];
    }

    public function prepareForValidation()
    {
        $data = TempCheckout::where('user_id', Auth::user()->id)->first();
        if($data){
            $temp = json_decode($data->data, true);
            $ids = array_column($temp, 'id');
            
            $cart = Cart::with('product_detail.product.brand','product_detail.product.category','product_detail.size','product_detail.color')->whereIn('id',$ids)->get();
            
            $product = [];
            $total_price = 0;
            foreach($cart as $item){
                $stock = collect($temp)
                ->filter(function ($q) use ($item) {
                    return $q['id'] == $item->id;
                })
                ->first();

                $total_price += $stock["qty"] * $item->product_detail->product->price;

                $result = [
                    "id" => $item->product_detail_id,
                    "name" => $item->product_detail->product->name,
                    "size" => $item->product_detail->size->size,
                    "color" => $item->product_detail->color->color,
                    "brand" => $item->product_detail->product->brand->name,
                    "category" => $item->product_detail->product->category->name,
                    "merchant_name" => "MFashion",
                    "url" => "https://mfashion.com",
                    "price" => $item->product_detail->product->price,
                    "total_price" => $stock["qty"] * $item->product_detail->product->price,
                    "quantity" => $stock["qty"],
                ];

                $product[] = $result;
            };
            $this->merge([
                "item_details" => $product,
                'user_id' => Auth::user()->id,
                'order_id' => "MF-".date('Ymdhms'),
                'price' => $total_price
            ]);
        }

    }
}
