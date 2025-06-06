<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard.index');
    }

    public function admin()
    {
        return view('dashboard.dashboard.index');
    }

    public function kasir()
    {
        return view('dashboard.dashboard.index');
    }

    public function user()
    {
        return view('dashboard.dashboard.index');
    }
}
