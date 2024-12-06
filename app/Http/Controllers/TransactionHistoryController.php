<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    public function index()
    {
        return view('pages.main.transaction-history.index');
    }

    public function show()
    {
        return view('pages.main.transaction-history.detail');
    }
}
