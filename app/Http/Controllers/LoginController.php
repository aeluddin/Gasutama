<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login',[
            'title' => 'Login'
        ]);
    }
    public function autentifikasi(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/dashboard/profile');
        }
        return back()->with(
            'error' , 'login gagal',
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
