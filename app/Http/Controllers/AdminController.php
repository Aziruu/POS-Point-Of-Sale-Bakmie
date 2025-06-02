<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index');
    }

    public function showUsers()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }
}
