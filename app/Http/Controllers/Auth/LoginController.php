<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login user.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // atau sesuai route kamu
        }
    
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // buat session baru

            // Redirect berdasarkan role user
            $role = Auth::user()->role;

            return match ($role) {
                'admin' => redirect('/admin'),
                'cust' => redirect('/cust'),
                default => redirect('/'),
            };
        }

        // Kalau gagal login, kembalikan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logout
        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate token

        return redirect('/login'); // Redirect ke halaman login
    }
}
