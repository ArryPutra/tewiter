@extends('main')

@section('main')
    <main class="p-8 max-w-2xl m-auto">
        <article class="mb-4 flex items-center gap-3">
            <a href="/" class="hover:bg-gray-50 p-2 rounded-xl duration-150 dark:hover:bg-slate-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>    
            </a>   
            <h1 class="text-xl font-semibold">Search Users</h1>
        </article>
        {{-- SEARCH INPUT --}}
        <form action="/search-users/" class="flex gap-2 mb-6" method="GET">
            <input value="{{ request('search') }}" name="search" class="border-none bg-gray-50 w-full p-2 rounded-md outline-none font-semibold placeholder caret-sky-500 duration-150 focus:border-sky-500 focus:ring-sky-500 focus:ring-2 dark:bg-slate-900" type="text" placeholder="Search Users ...">
            <button class="bg-sky-500 text-white px-2.5 rounded-md" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>                  
            </button>
        </form>
        {{-- END SEARCH INPUT --}}
        @foreach ($users as $user)
            @include('components.follow-account-row')
        @endforeach
        <main class="mb-20">
            {{ $users->links() }}
        </main>
        @include('components.popUpMenuBtn')
    </main>
@endsection