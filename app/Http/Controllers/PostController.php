<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;

class PostController extends Controller
{
    function index($_, Post $post) {
        return view('pages.post.detail-post', [
            'title' => $post->User->name . " Post",
            'post' => $post,
            'comments' => PostComment::where('post_id', $post->id)->get()
        ]);
    }
}
