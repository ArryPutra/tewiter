@extends('main')

@section('main')
<main class="flex flex-col-reverse md:flex-row items-center w-full h-screen">
    <article class="m-auto z-10 max-w-2xl p-6 rounded-md sm:shadow-lg bg-white dark:bg-slate-900">
        <h1 class="text-2xl font-semibold mb-5 flex items-center gap-2">            
            Create Account
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
            </svg>  
        </h1>
        <form class="flex flex-col gap-5" action="/signup" method="post">
            @csrf
            <main>
                <label for="name">Create Name</label>
                <input autofocus value="{{ old('name') }}" name="name" id="name" class="border-none mt-2 bg-gray-50 w-full p-2 rounded-md outline-none font-semibold placeholder caret-sky-500 duration-150 focus:border-sky-500 focus:ring-sky-300 focus:ring-2 dark:bg-slate-800" type="text" placeholder="Arry Putra">
                @error('name')
                <p class="text-sm mt-1.5 text-red-500">{{ $message }}</p>
                @enderror
            </main>
            <main>
                <label for="username">Create Username</label>
                <input value="{{ old('username') }}" name="username" id="username" class="border-none mt-2 bg-gray-50 w-full p-2 rounded-md outline-none font-semibold placeholder caret-sky-500 duration-150 focus:border-sky-500 focus:ring-sky-300 focus:ring-2 dark:bg-slate-800" type="text" placeholder="arryputra">
                @error('username')
                <p class="text-sm mt-1.5 text-red-500">{{ $message }}</p>
                @enderror
            </main>
            <main>
                <label for="password">Create Password</label>
                <input name="password" id="password" class="border-none mt-2 bg-gray-50 w-full p-2 rounded-md outline-none font-semibold placeholder caret-sky-500 duration-150 focus:border-sky-500 focus:ring-sky-300 focus:ring-2 dark:bg-slate-800" type="password" placeholder="pass1234">
                @error('password')
                <p class="text-sm mt-1.5 text-red-500">{{ $message }}</p>
                @enderror
            </main>
            <button class="bg-sky-400 text-white p-2 rounded-md hover:bg-sky-500 duration-100 focus:ring-sky-300 focus:ring-4" type="submit">SignUp</button>
        </form>
        <main class="text-sm flex justify-between items-center mt-4">
            <p>Already have an account?</p>
            <a href="/login" class="font-semibold text-sky-500">Login</a>
        </main>
    </article>
</main>
<svg class="absolute bottom-0 text-sky-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="currentcolor" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>
@endsection