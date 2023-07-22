@extends('main')

@section('main')
<main class="flex flex-col-reverse md:flex-row items-center w-full h-screen">
    <article class="m-auto z-10 max-w-2xl p-6 rounded-md sm:shadow-lg bg-white dark:bg-slate-900">
        <h1 class="text-2xl font-semibold mb-5 flex items-center gap-2">             
            User Login
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg> 
        </h1>
        @if (session()->has('succes'))
        <p class="text-sm font-medium -mt-3 mb-4 text-green-400 flex gap-1">
            {{ session('succes') }}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>                  
        </p>
        @endif
        @if (session()->has('fail'))
        <p class="text-sm font-medium -mt-3 mb-4 text-red-400 flex gap-1">
            {{ session('fail') }}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>                              
        </p>
        @endif

        {{-- @if (session()->has('succes'))
            <h1>{{ session('succes') }}</h1>
        @endif --}}
        
        <form class="flex flex-col gap-5" action="/login" method="post">
            @csrf
            <main>
                <label for="username" class="">Username</label>
                <input autofocus value="{{ old('username') }}" name="username" id="username" class="border-none mt-2 bg-gray-50 w-full p-2 rounded-md outline-none font-semibold placeholder caret-sky-500 duration-150 focus:border-sky-500 focus:ring-sky-300 focus:ring-2 dark:bg-slate-800" type="text" placeholder="arryputra">
                @error('username')
                <p class="text-sm mt-1.5 text-red-500">{{ $message }}</p>
                @enderror
            </main>
            <main>
                <label for="password" class="">Password</label>
                <input id="password" name="password" class="border-none mt-2 bg-gray-50 w-full p-2 rounded-md outline-none font-semibold placeholder caret-sky-500 duration-150 focus:border-sky-500 focus:ring-sky-300 focus:ring-2 dark:bg-slate-800" type="password" placeholder="pass1234">
                @error('password')
                <p class="text-sm mt-1.5 text-red-500">{{ $message }}</p>
                @enderror
            </main>
            <button class="bg-sky-400 text-white p-2 rounded-md hover:bg-sky-500 duration-100 focus:ring-sky-300 focus:ring-4" type="submit">Login</button>
        </form>
        <main class="text-sm flex justify-between items-center mt-4">
            <p>Don't have an account?</p>
            <a href="/signup" class="font-semibold text-sky-500">SignUp</a>
        </main>
    </article>
</main>
<svg class="absolute bottom-0 text-sky-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="currentcolor" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>
@endsection