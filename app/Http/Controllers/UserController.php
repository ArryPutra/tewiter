<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserFollow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function index(User $user) {

        // return 
        // "{$user->name} Post:" . $user->Post[0]
        // . "<br><br>".
        // "{$user->name} Follow: " . UserFollow::where('user_id', $user->id)->get()
        // . "<br><br>".
        // "{$user->name} Follower:" . UserFollow::where('follow_user_id', $user->id)->get()
        // ;
        return view('pages.profile.profile', [
            'title' => "User | $user->name",
            'user' => $user,
            'posts' => $user->Post()->latest()->get(),
            'follows' => UserFollow::where('user_id', $user->id)->get(),
            'followers' => UserFollow::where('follow_user_id', $user->id)->get()
        ]);
    }

    function update(Request $request, User $user) {
        $rules = [
            'name' => ['required', 'min:3', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'bio' => ['nullable'],
            'image' => ['image', 'file', 'max:5000']
        ];
        // JIKA REQUEST USERNAME TIDAK SAMA DENGAN USERNAME DI DATABASE
        // MAKA RULES DARI USERNAME HARUS UNIQUE
        if($request->username != $user->username) {
            $rules['username'] = ['required', 'unique:users', 'min:3', 'max:25', 'regex:/^[^\s]+$/', 'regex:/^[a-z0-9]+$/'];
        }
        $validatedData = $request->validate($rules);

        // JIKA ADA REQUEST FILE IMAGE MAKA SIMPAN FILE IMAGE KE STORAGE PROFILE-IMAGE
        if($request->file('image')) {
            if($user->image != '/profile-image/default.png') {
                Storage::delete($user->image);
            }
            $validatedData['image'] = $request->file('image')->store('profile-image');
        }
        User::where('id', $user->id)->update($validatedData);

        return redirect("/user/{$request->username}")->with('succesUpdateProfile', 'yes');
    }
    
}
