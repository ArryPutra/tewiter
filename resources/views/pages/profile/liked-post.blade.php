@extends('main')

@section('main')
    <main class="p-8 max-w-2xl m-auto h-screen">
        <header class="h-10 w-full flex items-center gap-3">
            <button onclick="history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg> 
            </button>
            <h1 class="text-xl font-semibold">
                {{ count($posts) }}
                Liked Posts
            </h1>
        </header>
        @if (count($posts) > 0)
            @foreach ($posts as $post)
            @php
                $post = $post->Post
            @endphp
            @include('components.post', [
                'postId' => $post->id,
                'userId' => $post->User->id,
                'name' => $post->User->name,
                'username' => $post->User->username,
                'category_post' => $post->PostCategory->name,
                'body' => $post->body,
                'postImage' => $post->image,
                'profileImage' => $post->User->image,
                'likes' => count($post->PostLike),
                'comments' => count($post->PostComment)
            ])
            @endforeach
        @else
            <div class="w-full h-[95%] flex items-center justify-center">
                <h1 class="text-gray-700 dark:text-gray-300">You don't have any posts liked.</h1>
            </div>
        @endif
    @include('components.popUpMenuBtn')
    </main>
@endsection