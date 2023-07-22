<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index() {
        return view('login', [
            'title' => "User Login",
        ]);
    }

    function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        // JIKA USER BERHASIL LOGIN
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // PINDAH KE HALAMAN HOME
            return redirect()->intended('/');
        }
        // JIKA USER GAGAL LOGIN
        return back()->with('fail', "Login failed");
    }

    function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
