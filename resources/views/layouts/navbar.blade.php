<nav class="h-20 flex items-center justify-between px-5">
    <h1 class="text-2xl font-bold text-sky-500">Tewiter</h1>
    @guest
    <div class="flex gap-2">
        <a href="/login">
            <button class="font-semibold border-2 border-sky-500 bg-sky-500 text-white rounded-lg py-1 px-3 hover:bg-sky-600 duration-150">Login</button>
        </a>
        <a href="/signup">
            <button class="font-semibold border-2 border-sky-500 text-sky-500 rounded-lg py-1 px-3">Sign Up</button>
        </a>
    </div>
    @endguest
    @auth
    <div id="myProfile" class="flex items-center gap-2 cursor-pointer">
        <img class="w-10 h-10 rounded-full object-cover" src="\storage\{{ Auth()->User()->image }}" alt="profile-image">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>              
    </div>
    @endauth
</nav>