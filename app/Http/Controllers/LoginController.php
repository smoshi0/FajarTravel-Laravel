<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function cobaLogin(Request $request)
    {
        $cobaLogin = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($cobaLogin)) {
            if (Auth::user()->level == 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboardAdmin');
            } elseif (Auth::user()->level == 'user') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboardUser');
            }
        }

        return back()->with('regis', 'LOGIN GAGAL BROW');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
