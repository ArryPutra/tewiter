@extends('main')

@section('main')
<main class="p-8 max-w-2xl m-auto">
    <main class="w-full">
        <form action="/post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-2">
                    <div>
                        <img class="w-10 h-10 rounded-full object-cover" src="\storage\{{ Auth()->User()->image }}" alt="profile-image">
                    </div>
                    <h1 class="font-semibold text-xl">{{ Auth()->User()->name }}</h1>
                </div>
                <button type="submit" class="bg-sky-400 text-white py-2 px-3 rounded-full focus:ring-sky-600 focus:ring-2 duration-200 font-semibold">Upload</button>
            </div>
            <select name="post_category_id" id="" class="mb-4 bg-gray-50 mt-4 text-sm dark:bg-slate-900 border-none rounded-xl">
                @foreach ($post_categories as $category)    
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            {{-- CHOOSE IMAGE FILE --}}
            <div class="mb-4 mt-2">
                <input class="block bg-gray-50 dark:bg-slate-900 w-1/2 rounded-md" name="image" type="file" id="image"
                onchange="chooseImageBtn()">
                <div class="h-2"></div>
                @error('image')
                <span class="text-sm text-red-600">
                    {{ $message }}
                </span>
                @enderror
            </div>
            {{-- END CHOOSE IMAGE FILE --}}
            {{-- IMAGE PREVIEW --}}
            <img id="imagePreview" class="rounded-lg max-h-96 w-full object-contain" alt="">
            {{-- END IMAGE PREVIEW --}}
            <textarea id="body" name="body" autofocus rows="3" placeholder="Type Here ..." name="body" class="w-full rounded-lg border-none bg-gray-50 focus:ring-gray-200 dark:bg-slate-900 dark:focus:ring-slate-800">{{ old('body') }}</textarea>
            <main class="flex justify-between items-center mt-2 gap-4">
                @error('body')
                <span class="text-sm text-red-600">
                    {{ $message }}
                </span>
                @enderror
                <span id="countTextBodyLenght" class="right-0 text-sm">0/999</span>
            </main>
        </form>
    </main>
</main>
<script src="/js/create-post/countTextBodyLength.js"></script>
<script src="/js/create-post/showImage.js"></script>
@endsection