{{-- POST --}}
<article class="py-6 border-b dark:border-b-slate-900 grid gap-3">
    {{-- PROFILE --}}
    <div class="flex items-center justify-between">
        <a href="/user/{{ $username }}" class="flex items-center gap-2 w-full">
            <img class="w-10 h-10 rounded-full object-cover" src="\storage\{{ $profileImage }}" alt="profile-image">
            <h1 class="">{{ $name }}</h1>
            @if ($username == 'rryputra')
            <span class="w-5 h-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-sky-500">
                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                </svg>
            </span>
            @endif                            
        </a>
        <main class="flex justify-end">
            <button id="dropDownMenuBtn{{ $postId }}" onclick="dropDownMenuBtn({{ $postId }})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                </svg>
            </button>
            <article id="dropDownMenu{{ $postId }}" class="hidden bg-white shadow text-start mt-10 absolute p-4 rounded-md dark:bg-slate-900">
                <div class="flex items-center gap-2">
                    <button onclick="copyPostUrl('post/{{ $username }}/{{ $postId }}', {{ $postId }})" class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                        </svg>                      
                        Copy URL
                    </button>
                </div>
                @auth
                @if (Auth()->User()->id == $userId)
                <div class="w-full h-0.5 bg-slate-50 my-3 dark:bg-slate-800"></div>
                <button onclick="deletePostBtn({{ $postId }})" class="flex items-center gap-2 text-red-600 bg-slate-50 w-full p-2 rounded-md dark:bg-slate-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>                      
                    Delete
                </button>
                @endif
                @endauth
            </article>
        </main>
    </div>
    {{-- END PROFILE --}}
    {{-- BODY --}}
    <a href="/post/{{ $username }}/{{ $postId }}" class="break-all">
        {!! nl2br(e($body)) !!}
    </a>
    {{-- END BODY --}}
    {{-- IMAGE --}}
    {{-- <a href="/post/{{ $username }}/{{ $postId }}">
        <img class="rounded-md" src="https://source.unsplash.com/1280x720/?{{ $image }}" alt="post-image">
    </a> --}}
    @if ($postImage != null)        
        <a href="/post/{{ $username }}/{{ $postId }}">
            <img class="rounded-md max-h-96 w-full object-contain" src="/storage/{{ $postImage }}" alt="post-image">
        </a>
    @endif
    {{-- END IMAGE --}}
    {{-- ENGAGEMENT --}}
    <div class="mt-0 text-sm rounded-xl gap-5 flex items-center">
        <div class="flex gap-1 items-center">
        {{-- <form action="/like-post/{{ $postId }}" method="post" id="likePostForm{{ $postId }}" class="inline-flex">
            @csrf
            <button type="submit" id="mainLikePostIcon{{ $postId }}" onclick="likePostBtn({{ $postId }})">
                <svg id="falseLikeIcon{{ $postId }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg> 
                <svg id="trueLikeIcon{{ $postId }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-600 absolute opacity-0 pointer-events-none">
                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                </svg>
            </button>  
        </form> --}}
        <form action="/like-post/{{ $postId }}" method="post" id="likePostForm{{ $postId }}" class="inline-flex">
            @csrf
            <button
            @auth
            class= @foreach ($post->PostLike as $postLike)
            @if ($postLike->user_id == Auth()->User()->id)
                "likePostIconTrue"
            @endif
            @endforeach
            @endauth
            type="submit" id="mainLikePostIcon{{ $postId }}" onclick="likePostBtn({{ $postId }})">
                <svg id="falseLikeIcon{{ $postId }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute duration-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg> 
                <svg id="trueLikeIcon{{ $postId }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-600 opacity-0 pointer-events-none duration-100 scale-0">
                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                </svg>
            </button>  
        </form>
        <h1 id="likePostNumber{{ $postId }}">{{ $likes }}</h1>
        <span class="hidden sm:inline-block">Like</span>
        </div>
        <div class="flex gap-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
            </svg>              
            <h1>{{ $comments }} <span class="hidden  sm:inline-block">Comments</span></h1>
        </div>
        <h1 class="bg-gray-50 ml-auto p-2 rounded-lg text-sm dark:bg-slate-900">{{ $category_post }}</h1>
    </div>
    {{-- END ENGAGEMENT --}}
</article>
{{-- END POST --}}

@auth
@if (Auth()->User()->id == $userId)
{{-- DELETE POST DIALOG --}}
<main>
    <div id="overlayDeletePostDialog{{ $postId }}" class="z-10 opacity-0 pointer-events-none bg-black w-full h-screen fixed top-1/2 -right-1/2 -translate-x-1/2 -translate-y-1/2"></div>
    <article id="deletePostDialog{{ $postId }}" class="opacity-0 z-20 pointer-events-none duration-150 fixed bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 bg-white shadow-lg p-5 rounded-xl dark:bg-slate-900 scale-110">
        <h1 class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-600 m-auto mb-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>                  
            Are you sure want to delete this Post?
        </h1>
        <div class="mt-4 flex justify-center text-sm">
            <form action="/post/{{ $postId }}" method="post">
                @method('delete')
                @csrf
                <button class="bg-red-600 text-white duration-150 p-2 rounded-md hover:bg-red-700">Yes, I'm sure</button>
            </form>
            <button onclick="cancelDeletePostDialogBtn({{ $postId }})" class="bg-gray-50 p-2 rounded-md ml-3 hover:bg-gray-200 duration-150 dark:bg-slate-800">No, cancel</button>
        </div>
    </article>
</main>
{{-- END DELETE POST DIALOG --}}
@endif
@endauth

