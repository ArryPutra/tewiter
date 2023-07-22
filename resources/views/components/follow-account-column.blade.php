<article class="border rounded-lg min-w-[10rem] h-52 w-28 flex flex-col items-center justify-evenly p-2 hover:bg-gray-50 duration-75 cursor-pointer dark:hover:bg-slate-900 dark:border-slate-900 overflow-hidden">
    <a href="/user/{{ $username }}" class="flex flex-col items-center overflow-hidden">
        <img class="w-16 rounded-full" src="\storage\{{ $image }}" alt="">
        <h1 class="font-semibold mt-2 text-center line-clamp-2 max-w-[8rem]">{{ $name }}</h1>
        <p class="text-sm text-gray-600">{{ $username }}</p>
    </a>
    <form id="followUserForm{{ $id }}" action="/follow-user/{{ $user->id }}" method="post">
        @csrf
        @auth 
        @if (Auth()->User()->id != $id)
        <main onclick="mainFollowBtn({{ $id }})" id="mainFollowBtn{{ $id }}" class= 
        "@foreach (Auth()->User()->UserFollow as $authFollow)
        @if ($authFollow->follow_user_id == $id) 
        followed
        @endif
        @endforeach mainFollowBtn
        relative">
            <button class="opacity-0 pointer-events-none absolute right-1/2 translate-x-1/2 bg-gray-100 dark:bg-slate-900 text-sm py-1.5 px-4 rounded-full flex items-center gap-1 hover:bg-sky-600 duration-100">
                Followed
            </button>
            <button class="bg-sky-500 text-sm text-white py-1.5 px-4 rounded-full flex items-center gap-1 hover:bg-sky-600 duration-100">
                Follow          
            </button>
        </main>
        @endauth
        @else
        <button class="bg-sky-500 text-sm text-white py-1.5 px-4 rounded-full flex items-center gap-1 hover:bg-sky-600 duration-100">
            Follow          
        </button>
        @endif
    </form>
</article>