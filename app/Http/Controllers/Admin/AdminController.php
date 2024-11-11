<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexDashboard() {
        return view('pages.admin.dashboard.index');
    }
}
