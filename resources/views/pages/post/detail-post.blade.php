@extends('main')

@section('main')
    <main class="p-8 pb-20 max-w-2xl m-auto">
        <article class="flex items-center gap-3">
            <button onclick="history.back()" class="hover:bg-gray-50 p-2 rounded-xl duration-150 dark:hover:bg-slate-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>    
            </button>                            
            <h1 class="text-xl font-semibold">Post</h1>
        </article>
        @include('components.post', [
        'postId' => $post->id,
        'userId' => $post->User->id,
        'name' => $post->User->name,
        'username' => $post->User->username,
        'category_post' => $post->PostCategory->name,
        'body' => $post->body,
        'postImage' => $post->image,
        'profileImage' => $post->user->image,
        'likes' => count($post->PostLike),
        'comments' => count($post->PostComment)
        ])
        <div class="mb-6"></div>

        <main> 
            @foreach ($comments as $comment)
                @include('components.post-comment', [
                    'id' => $comment->id,
                'user_id' => $comment->User->id,
                    'body' => $comment->body,
                    'name' => $comment->User->name,
                    'username' => $comment->User->username,
                    'image' => $comment->User->image
                ])
            @endforeach
        </main>
        {{-- TYPE COMMENT --}}
        <article class="w-full py-5 px-8 bg-white items-center fixed bottom-0 left-0 dark:bg-slate-950">
            <form action="/post-comment/{{ $post->id }}" method="POST" class="flex gap-3 max-w-2xl m-auto">
                @csrf
                <input name="body" class="mr-4 w-full border-0 focus:ring-0 rounded-xl bg-gray-100 dark:bg-slate-900" type="text" placeholder="Great post! ...">
                <button class="bg-sky-500 text-white py-2 px-2 rounded-xl duration-150 hover:bg-sky-600 hover:ring-2 focus:ring-sky-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                    </svg>                      
                </button>
            </form>
        </article>
        {{-- END TYPE COMMENT --}}
    </main>
    <script src="/js/components/post-comment.js"></script>
@endsection