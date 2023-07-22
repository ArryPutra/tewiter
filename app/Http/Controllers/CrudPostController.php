<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CrudPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create-post', [
            'title' => "Create New Post",
            'post_categories' => PostCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'body' => ['required', 'max:999'],
            'image' => ['image', 'file', 'max:5000']
        ]);
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        $validatedData['user_id'] = Auth()->User()->id;
        $validatedData['post_category_id'] = $request->post_category_id;
        Post::create($validatedData); 
        return redirect('/')->with('succesUploadPost', 'yes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId)
    {
        // MENCARI POST BERDASARKAN ID PARAM
        $post = Post::find($postId);
        
        // JIKA POST ADA GAMBAR MAKA ...
        if($post->image) {
            // MENGHAPUS GAMBAR POST
            Storage::delete($post->image);
        }

        // MENGHAPUS POST BERDASARKAN ID
        Post::destroy($post->id);

        // MENGEMBALIKAN KE HALAMAN AWAL
        return redirect('/')->with('succesDeletePost', "Succes deleted Post!");
    }
}
