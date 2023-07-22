@extends('main')

@section('main')
<div class="absolute m-8 bg-slate-900 rounded-md p-1.5 pr-3 backdrop-blur-lg backdrop-filter bg-slate-900/30 text-white">
    <button class="flex items-center gap-2" onclick="history.back()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg> 
        <h1>Profile</h1>
    </button>
</div>
<img class="m-auto w-full h-56 object-cover" src="https://source.unsplash.com/1920x1080?programming" alt="">
<main class="max-w-6xl m-auto px-8">
    {{-- PROFILE INFO --}}
    <div class="shadow relative bg-white z-10 p-4 rounded-lg flex flex-col justify-between gap-3 -mt-6 dark:bg-slate-900">
        <div class="flex flex-col md:flex-row gap-4 justify-between">
            <article class="flex items-center gap-3">
                {{-- <a href="https://www.flaticon.com/free-icons/user" title="user icons">User icons created by Freepik - Flaticon</a> --}}
                <img class="hidden" id="oldPreviewImage" src="\storage\{{ $user->image }}" alt="">
                <img class="rounded-full w-10 aspect-square object-cover" src="\storage\{{ $user->image }}" alt="image-profile">    
                <div class="flex flex-col">
                    <h1 class="break-all font-semibold flex gap-2 items-center">
                        {{ $user->name }}
                        @if ($user->username == 'rryputra')
                        <span class="w-5 h-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-sky-500">
                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        @endif
                    </h1>
                    <h1 class="text-sm text-gray-500">{{ $user->username }}</h1>
                </div>
            </article>
            @auth    
                @if (Auth()->User()->id == $user->id)   
                <button onclick="editProfileBtn()" class="w-fit text-sm bg-gray-100 p-2 rounded-md duration-200 hover:bg-gray-200 focus:ring-2 focus:ring-gray-300 dark:bg-slate-800 dark:focus:ring-slate-700">Edit Profile</button>
                @else
                <form id="followUserForm{{ $user->id }}" action="/follow-user/{{ $user->id }}" method="post">
                    @csrf
                    <main onclick="mainFollowBtn({{ $user->id }})" id="mainFollowBtn{{ $user->id }}" class=
                    "@foreach (Auth()->User()->UserFollow as $authFollow)
                    @if ($authFollow->follow_user_id == $user->id) 
                    followed
                    @endif
                    @endforeach mainFollowBtn relative w-fit">
                        <button class="opacity-0 pointer-events-none bg-gray-100 dark:bg-slate-800 p-2 h-fit rounded-full text-sm">
                            Followed
                        </button>
                        <button class="absolute left-0 bg-sky-500 p-2 h-fit rounded-full text-white text-sm">
                            Follow
                        </button>
                    </main>
                </form>  
                @endif
            @endauth
        </div>
        <main class="font-thin">
            <h1 class="mb-3 break-all">{!! nl2br(e($user->bio)) !!}</h1>
            <article class="flex text-gray-500 items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>              
                <h1 class="text-sm">{{ "Join {$user->created_at->day} {$user->created_at->format('F')} {$user->created_at->year}"  }}</h1>
            </article>
        </main>
    </div>
    <div class="mt-6 flex justify-evenly">
        <button onclick="followersDialogBtn()">
            <h1 class="text-center">{{ count($followers) }}<br>Followers</h1>
        </button>
        <button onclick="followsDialogBtn()">
            <h1 class="text-center">{{ count($follows) }}<br>Follows</h1>
        </button>
        <h1 class="text-center">{{ count($user->Post) }}<br>Posts</h1>
    </div>
    <div class="w-full h-[1px] bg-gray-200 dark:bg-slate-800 my-8"></div>
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
    {{-- END PROFILE INFO --}}
    @include('components.popUpMenuBtn')
</main>
    {{-- EDIT PROFILE DIALOG --}}
    @auth
    @if (Auth()->User()->id == $user->id)
    <main>
        {{-- OVERLAY --}}
        <div id="overlayEditProfileDialog" class="z-10 opacity-0 pointer-events-none bg-black w-full h-screen fixed top-1/2 -right-1/2 -translate-x-1/2 -translate-y-1/2" 
        style="
        @error('name') opacity: 0.5; pointer-events: auto;  @enderror
        @error('username') opacity: 0.5; pointer-events: auto; @enderror
        @error('image') opacity: 0.5; pointer-events: auto; @enderror
        ">
        </div>
        {{-- END OVERLAY --}}
        {{-- DIALOG --}}
        <article id="editProfileDialog" class="opacity-0 pointer-events-none w-4/5 max-w-2xl z-20 duration-150 fixed bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 bg-white shadow-lg p-5 rounded-xl dark:bg-slate-900" 
        style="
        @error('name') opacity: 1; pointer-events: auto; @enderror
        @error('username') opacity: 1; pointer-events: auto; @enderror
        @error('image') opacity: 1; pointer-events: auto; @enderror
        ">
            <main class="flex items-center mb-4 justify-between">
                <h1 class="text-xl font-semibold">Edit Profile</h1>
                <button onclick="cancelEditProfileDialogBtn()" class="bg-gray-50 rounded-lg p-1 duration-150 hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 dark:bg-slate-800 dark:focus:ring-slate-600 dark:hover:bg-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </main>
            {{-- FORM --}}
            <form class="flex flex-col gap-5" action="/update-profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <main class="cursor-pointer">
                    <input id="image" class="absolute w-24 h-24 mt-1.5 opacity-0" type="file" name="image"
                    onchange="chooseImageBtn()">
                    <img id="imagePreview" class="w-24 h-24 rounded-full object-cover my-1.5" src="\storage\{{ $user->image }}" alt="">
                    @error('image')
                        <p class="text-sm mt-3 text-red-500">{{ $message }}</p>
                    @enderror
                </main>
                {{-- NAME --}}
                <main>
                    <label for="name" class="">Name</label>
                    <input value="{{ $user->name }}" name="name" id="name" class="border-none mt-2 bg-gray-100 w-full p-2 rounded-md outline-none font-semibold placeholder caret-blue-600 duration-150 focus:ring-blue-600 focus:ring-2 dark:bg-slate-800" type="text">
                    @error('name')
                        <p class="text-sm mt-1.5 text-red-500">{{ $message }}</p>
                    @enderror
                </main>
                {{-- END NAME --}}
                {{-- USERNAME --}}
                <main>
                    <label for="username" class="">Username</label>
                    <input value="{{ $user->username }}" name="username" id="username" class="border-none mt-2 bg-gray-100 w-full p-2 rounded-md outline-none font-semibold placeholder caret-blue-600 duration-150 focus:ring-blue-600 focus:ring-2 dark:bg-slate-800" type="text">
                    @error('username')
                        <p class="text-sm mt-1.5 text-red-500">{{ $message }}</p>
                    @enderror
                </main>
                {{-- END USERNAME --}}
                {{-- BIO --}}
                <main>
                    <label for="bio" class="">Bio</label>
                    <textarea name="bio" id="bio" rows="4" class="border-none mt-2 bg-gray-100 w-full p-2 rounded-md outline-none font-semibold placeholder caret-blue-600 duration-150 focus:ring-blue-600 focus:ring-2 dark:bg-slate-800">{{ $user->bio }}</textarea>
                </main>
                {{-- END BIO --}}
                {{-- SUBMIT --}}
                <button class="bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 duration-100 focus:ring-sky-300 focus:ring-4" type="submit">Update</button>
                {{-- END SUBMIT --}}
            </form>
            {{-- END FORM --}}
        </article>
        {{-- END DIALOG --}}
    </main>
    @endif
    @endauth
    {{-- END EDIT PROFILE DIALOG --}}

    {{-- FOLLOWERS DIALOG --}}
    <article>
        <div id="overlayFollowersDialog" class="z-10 opacity-0 pointer-events-none bg-black w-full h-screen fixed top-1/2 -right-1/2 -translate-x-1/2 -translate-y-1/2"></div>
        {{-- DIALOG --}}
        <article id="followersDialog" class="opacity-0 pointer-events-none w-4/5 max-w-2xl z-20 duration-150 fixed bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 bg-white shadow-lg p-5 rounded-xl dark:bg-slate-950">
            <main class="flex items-center mb-4 justify-between">
                <h1 class="text-xl font-semibold">{{ count($followers) }} Followers</h1>
                <button onclick="cancelFollowersDialogBtn()" class="bg-gray-50 rounded-lg p-1 duration-150 hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 dark:bg-slate-800 dark:focus:ring-slate-600 dark:hover:bg-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </main>
            <div class="mb-6 mt-4 bg-gray-100 h-0.5 dark:bg-slate-800"></div>
            <article class="max-h-[60vh] overflow-y-scroll">
                @if ($followers->isEmpty())
                    <h1 class="text-gray-700 dark:text-gray-400">User has no followers.</h1>
                @else
                    @foreach ($followers as $user)
                    @php
                        $user = $user->UserFollower
                    @endphp
                    <main class="border p-5 rounded-xl mb-5 flex gap-3 border-gray-200 dark:border-slate-800">
                        <div href="/user/{{ $user->username }}" class="flex items-center">
                            <img class="object-cover rounded-full aspect-square w-12" src="/storage/{{ $user->image }}" alt="profile-image">
                        </div>
                        <a href="/user/{{ $user->username }}" class="overflow-hidden w-[80%]">
                            <h1 class="font-semibold overflow-hidden text-ellipsis line-clamp-2">{{ $user->name }}</h1>
                            <h1 class="text-sm text-gray-700 line-clamp-2 dark:text-slate-400">{{ $user->username }}</h1>
                        </a>
                    </main>
                    @endforeach
                @endif
            </article>
        </article>
        {{-- END DIALOG --}}
    </article>
    {{-- END FOLLOWERS DIALOG --}}

    {{-- FOLLOWS DIALOG --}}
    <article>
        <div id="overlayFollowsDialog" class="z-10 opacity-0 pointer-events-none bg-black w-full h-screen fixed top-1/2 -right-1/2 -translate-x-1/2 -translate-y-1/2"></div>
        {{-- DIALOG --}}
        <article id="followsDialog" class="opacity-0 pointer-events-none w-4/5 max-w-2xl z-20 duration-150 fixed bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 bg-white shadow-lg p-5 rounded-xl dark:bg-slate-950">
            <main class="flex items-center mb-4 justify-between">
                <h1 class="text-xl font-semibold">{{ count($follows) }} Follows</h1>
                <button onclick="cancelFollowsDialogBtn()" class="bg-gray-50 rounded-lg p-1 duration-150 hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 dark:bg-slate-800 dark:focus:ring-slate-600 dark:hover:bg-slate-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </main>
            <div class="mb-6 mt-4 bg-gray-100 h-0.5 dark:bg-slate-800"></div>
            <article class="max-h-[60vh] overflow-y-scroll">
                @if ($follows->isEmpty())
                    <h1 class="text-gray-700 dark:text-gray-400">User has no follow.</h1>
                @else
                    @foreach ($follows as $user)
                    @php
                        $user = $user->UserFollow
                    @endphp
                    @include('components.follow-account-row')
                    @endforeach
                @endif
            </article>
        </article>
        {{-- END DIALOG --}}
    </article>
    {{-- END FOLLOWS DIALOG --}}

    

    <script src="/js/profile/editProfileDialog.js"></script>
    <script src="/js/profile/showImage.js"></script>

    <script src="/js/profile/followersDialog.js"></script>
    <script src="/js/profile/followsDialog.js"></script>
@endsection