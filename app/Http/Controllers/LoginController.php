<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function cobaLogin(Request $request){
        $cobaLogin = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($cobaLogin)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('regis', 'LOGIN GAGAL BROW');
    }

    public function logout(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');

    }
}
