<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function autentikasi(Request $request)
    {
        $user = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($user)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('Gagal', 'Login Gagal');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
