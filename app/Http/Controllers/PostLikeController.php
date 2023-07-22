<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\PostLike;
use App\Models\User;

class PostLikeController extends Controller
{
    public function index(User $user) {
        // return $user->PostLike;
        if($user->id == Auth()->User()->id) {
            return view('pages.profile.liked-post', [
                'title' => "Liked Post",
                'posts' => PostLike::where('user_id', $user->id)->latest()->get()
            ]);
        } else {
            return redirect("/user/$user->username");
        }
    }
    
    public function store(Post $post) {
        // MENGAMBIL DATA USER
        $user = Auth()->User();
        
        $existingLike = PostLike::where('user_id', $user->id)
                                ->where('post_id', $post->id)
                                ->first();
        
        if ($existingLike) {
            $existingLike->delete();
        } else {
            PostLike::create(['user_id' => $user->id, 'post_id' => $post->id]);
        }
    }
}
