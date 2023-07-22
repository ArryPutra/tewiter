<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    function index(PostCategory $postCategory) {
        $posts = Post::where('post_category_id', $postCategory->id)
                            ->latest()->simplePaginate(5);

        if(request('search')) {
            $posts = Post::where('body', 'like', '%' . request('search') . '%' )->latest()->simplePaginate(5);
        }
        return view('pages.home.category-posts', [
            'title' => "Post | " . $postCategory->name,
            'posts' => $posts,
            'post_categories' => PostCategory::all(),
            'users' => User::latest()->take(5)->get(),
            'post_category_right_now_id' => $postCategory->id
        ]
        );
    }
}
