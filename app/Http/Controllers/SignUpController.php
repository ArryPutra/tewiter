<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    // MENAMPILKAN HALAMAN
    function index() {
        return view('signup', [
            'title' => "Create New Account"
        ]);
    }
    // MENYIMPAN DATA
    function store(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'username' => ['required', 'unique:users', 'min:3', 'max:25', 'regex:/^[^\s]+$/', 'regex:/^[a-z0-9]+$/'],
            'password' => ['required', 'min:3', 'max:50'],
            'bio' => ['nullable', 'max:100']
        ]);
    User::create($validatedData);
    
    return redirect('/login')->with('succes', 'Create an account successfull');
    }
}
