<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.admin.transactions.index');
    }

    public function dataTable(Request $request){
        $data = Transaction::query();
        return BaseDatatable::Table($data);
    }
}
