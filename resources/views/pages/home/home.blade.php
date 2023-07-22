@extends('main')

@section('main')
    @auth
    {{-- LOGOUT DIALOG --}}
    <main>
        <div id="overlay" class="hidden w-full h-full bg-black opacity-50 fixed z-10"></div>
        <article id="logoutDialog" class="scale-110 z-20 pointer-events-none opacity-0 duration-150 fixed bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 bg-white shadow-lg p-5 rounded-xl dark:bg-slate-900">
            <h1 class="items-center">Are you sure want to logout?</h1>
            <div class="text-end mt-4 flex justify-end">
                <form action="/logout" method="POST">
                    @csrf
                    <button class="flex items-center gap-2 bg-red-100 text-red-600 duration-150 p-2 rounded-md hover:bg-red-200 dark:bg-slate-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>                      
                        Logout
                    </button>
                </form>
                <button onclick="logoutCancelBtn()" class="bg-gray-50 p-2 rounded-md ml-3 hover:bg-gray-200 duration-150 dark:bg-slate-900">Cancel</button>
            </div>
        </article>
    </main>
    {{-- END LOGOUT DIALOG --}}
    @endauth
    {{-- NAVBAR --}}
    @include('layouts.navbar')
    {{-- END NAVBAR --}}
    {{-- DROP DOWN MY PROFILE --}}
    @auth
    <div id="dropDownMyProfile" class="max-w-[90%] duration-100 opacity-0 pointer-events-none cursor-pointer absolute top-24 right-5 bg-white shadow py-3 px-2.5 rounded-md dark:bg-slate-900">
        {{-- PROFILE --}}
        <a href="/user/{{ Auth()->User()->username }}">
            <button class="w-full flex items-center gap-2 mb-2 hover:bg-gray-50 p-2 rounded-lg duration-75 dark:hover:bg-slate-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>                            
                <h1>
                    {{ Auth()->user()->name }}
                </h1>
            </button>
        </a>
        <a href="/user/{{ Auth()->User()->username }}/liked-posts">
            <button class="w-full flex items-center gap-2 mb-2 hover:bg-gray-50 p-2 rounded-lg duration-75 dark:hover:bg-slate-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-600">
                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                </svg>                  
                <h1>
                    Liked Posts
                </h1>
            </button>
        </a>
        {{-- END PROFILE --}}
        <div class="w-full h-[1px] bg-gray-200 mb-4 dark:bg-slate-800"></div>
        {{-- LOGOUT --}}
        <button onclick="logoutBtn()" class="w-full bg-red-100 p-2 rounded-md text-red-600 flex items-center gap-2 dark:bg-slate-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>              
            Logout
        </button>
        {{-- END LOGOUT --}}
    </div>
    @endauth
    {{-- END DROP DOWN MY PROFILE --}}
    <main class="p-8 pb-32 max-w-2xl m-auto">
        {{-- SEARCH INPUT --}}
        <form action="/" class="flex gap-2 mb-2" method="GET">
            <input value="{{ request('search') }}" name="search" class="border-none bg-gray-50 w-full p-2 rounded-md outline-none font-semibold placeholder caret-sky-500 duration-150 focus:border-sky-500 focus:ring-sky-500 focus:ring-2 dark:bg-slate-900" type="text" placeholder="Search Posts ...">
            <button class="bg-sky-500 text-white px-2.5 rounded-md" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>                  
            </button>
        </form>
        {{-- END SEARCH INPUT --}}
        <div class="mt-4 flex gap-2 flex-wrap">
            <a href="/"><button class="bg-gradient-to-r from-sky-400 to-sky-500 text-white p-2 rounded-xl">All</button></a>
            @foreach ($post_categories as $category)
                <a href="/posts/{{ $category->slug }}"><button class="bg-gray-50 p-2 rounded-xl dark:bg-slate-900">{{ $category->name }}</button></a>
            @endforeach

        </div>
        <main>
            <h1 class="mb-4 mt-6 text-2xl font-semibold flex items-center gap-2">
                Find Peoples          
            </h1>
            {{-- MAIN FIND PEOPLES --}}
            <div class="flex w-full overflow-x-scroll gap-5 mb-8">
                @foreach ($users as $user)
                    @include('components.follow-account-column', [
                        'id' => $user->id,
                        'name' => $user->name,
                        'username' => $user->username,
                        'image' => $user->image
                    ])
                @endforeach
                <a href="/search-users">
                    <button class="rounded-lg min-w-[10rem] h-48 flex items-center justify-center p-2 text-gray-600 gap-2">
                        See More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>                  
                    </button>
                </a>
            </div>
            {{-- END MAIN FIND PEOPLES --}}
            {{-- MAIN POSTS --}}
            @foreach ($posts as $post)
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
            {{-- EMD MAIN POSTS --}}
            <main class="mt-6 mb-4">
                {{ $posts->links() }}
            </main>
            <h1 class="text-sm text-gray-800 text-end dark:text-gray-200">
                Page {{ $posts->currentPage() }}
            </h1>
        </main>
        @include('components.popUpMenuBtn')
    </main>
    <script src="/js/home.js"></script>
    @auth<script src="/js/homeAuth.js"></script>@endauth

@endsection