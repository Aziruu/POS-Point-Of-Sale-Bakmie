<?php

namespace App\Http\Controllers;
use App\Models\Menu; // Pastikan kamu import model Menu
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Ambil semua data menu dari database
        $menus = Menu::all();

        // Kirim variabel menus ke view
        return view('dashboard.order.index', compact('menus'));
    }
}
