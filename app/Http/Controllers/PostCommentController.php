<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store($postId, Request $request)
    {
        $validatedData = $request->validate([
            'body' => ['required', 'min:1', 'max:200']
        ]);
        $validatedData['user_id'] = Auth()->user()->id;
        $validatedData['post_id'] = $postId;
        PostComment::create($validatedData);

        return redirect("/post/rryputra/$postId");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostComment $postComment)
    {
        PostComment::destroy($postComment->id);

        return redirect()->back();
    }
}
