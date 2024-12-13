<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;

class AdminController extends Controller
{
    public function indexDashboard() {
        $start_year = User::selectRaw('YEAR(created_at) as year')->orderBy('created_at','ASC')->first()?->year ?? date('Y');
        $year = [];
        for($i = (int)$start_year; $i <= (int)date('Y'); $i++){
            $year[] = $i;
        }
        return view('pages.admin.dashboard.index', compact('year'));
    }

    public function dataDashboard(Request $request)
    {
        $year = $request->year ?? date('Y');
        try {
            // query for transaction
            $transaksi = Transaction::whereYear('created_at', $year);
            $count_transaction = $transaksi->count();
            $sum_transaction = (clone $transaksi)->where('status','PAID')->sum('price');

            // query for product
            $product = Product::where('is_delete',0);
            $count_product = $product->count();
            
            // query for user
            $user = User::where('is_delete',0)->role('user');
            $count_user = $user->count();

            // mapping for response data
            $data = new stdClass();
            //card
            $data->card = (object)[
                'count_transaction' => $count_transaction,
                'count_product' => $count_product,
                'count_user' => $count_user,
                'sum_transaction' => $sum_transaction,
            ];
            // chart transaction
            $data->chart_transaction = []; 
            for($i = 1; $i <= 12; $i++)
            {
                $data->chart_transaction[$i] = (clone $transaksi)->whereMonth('created_at', $i)->count(); 
            }
            // chart user
            $data->chart_user = []; 
            for($i = 1; $i <= 12; $i++)
            {
                $data->chart_user[$i] = (clone $user)->whereYear('created_at', $year)->whereMonth('created_at', $i)->count(); 
            }
            //best seller category
            $data->category_best_seller = Category::select('categories.name')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->selectRaw('SUM(product_details.sold) as total_sold')
            ->groupBy('categories.name')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();
        //best seller brand
            $data->brand_best_seller = Brand::select('brands.name')
            ->join('products', 'brands.id', '=', 'products.brand_id')
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->selectRaw('SUM(product_details.sold) as total_sold')
            ->groupBy('brands.name')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();
            //last transaction
            $data->product_best_seller = (clone $product)->withSum('details','sold')->orderBy('details_sum_sold', 'DESC')->limit(5)->get();
            //last transaction
            $data->new_transaction = (clone $transaksi)->orderBy('created_at', 'DESC')->limit(5)->get();

            return response()->json(["message" => "Berhasil mengambil data dashboard", "success" => true, "data" => $data])->setStatusCode(200);
        }catch(\Throwable $th){
            return response()->json(["message" => $th->getMessage(), "success" => false])->setStatusCode(400);
        }
    }
}
