<main class="border p-5 rounded-xl mb-5 flex gap-3 border-gray-200 dark:border-slate-800">
    <div href="/user/{{ $user->username }}" class="flex items-center">
        <img class="object-cover rounded-full aspect-square w-12" src="/storage/{{ $user->image }}" alt="profile-image">
    </div>
    <a href="/user/{{ $user->username }}" class="overflow-hidden w-[80%]">
        <h1 class="font-semibold overflow-hidden text-ellipsis line-clamp-2">{{ $user->name }}</h1>
        <h1 class="text-sm text-gray-700 line-clamp-2 dark:text-slate-400">{{ $user->username }}</h1>
    </a>
    @if (Auth()->User()->id != $user->id)
        
    
    <form id="followUserForm{{ $user->id }}" action="/follow-user/{{ $user->id }}" method="post">
        @csrf
        <main onclick="mainFollowBtn({{ $user->id }})" id="mainFollowBtn{{ $user->id }}" class=
        "@foreach (Auth()->User()->UserFollow as $authFollow)
        @if ($authFollow->follow_user_id == $user->id) 
        followed
        @endif
        @endforeach mainFollowBtn relative">
            <button class="opacity-0 pointer-events-none bg-gray-100 dark:bg-slate-900 p-2 h-fit rounded-full text-sm">
                Followed
            </button>
            <button class="absolute right-0 bg-sky-500 p-2 h-fit rounded-full text-white text-sm">
                Follow
            </button>
        </main>
    </form>  
    @endif
</main>