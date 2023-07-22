{{-- COMMENT --}}
{{-- <div>
    <div class="flex gap-3 mb-3">
        <a href="/user/{{ $username }}">
            <img class="w-10 h-10 mt-1.5 rounded-full object-cover" src="/storage/{{ $image }}" alt="profile-image">
        </a>
        <div class="w-full">
            <div class="flex justify-between">
                <a href="/user/{{ $username }}" class="text-lg">{{ $name }}</a>
                <button class="relative">
                    <svg onclick="dropDownMenuBtnComment({{ $id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                    </svg>
                    <article onclick="postCommentDeleteBtn({{ $id }})" id="postCommentDeleteBtn{{ $id }}" class="pointer-events-none hidden text-red-600 gap-2 mt-2 bg-white shadow text-start absolute p-3 right-8 top-0 rounded-md dark:bg-slate-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                        Delete
                    </article>
                </button>
                
            </div>
            <p class="text-sm break-all font-thin text-gray-700 dark:text-gray-200">{{ $body }}</p>
            <div class="w-full h-[1px] my-3"></div>
        </div>
    </div>
</div> --}}
<article class="mb-4 flex gap-3">
    <div class="mt-1.5 w-[7%]">
        <a href="/user/{{ $username }}">
            <img class="rounded-full object-cover aspect-square" src="/storage/{{ $image }}" alt="profile-image">
        </a>
    </div>
    <main class="w-[85%]">
        <a href="/user/{{ $username }}" class="text-lg break-all">{{ $name }}</a>
        <p class="text-sm break-all font-thin text-gray-700 dark:text-gray-200">{{ $body }}</p>
    </main>
    @auth
    @if (Auth()->User()->id == $user_id)
    <button class="relative h-10" onclick="dropDownMenuBtnComment({{ $id }})">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
        </svg>
        <article onclick="postCommentDeleteBtn({{ $id }})" id="postCommentDeleteBtn{{ $id }}" class="pointer-events-none hidden text-red-600 gap-2 mt-2 bg-white shadow text-start absolute p-3 right-8 top-0 rounded-md dark:bg-slate-900">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
            Delete
        </article>
    </button>
    @endif
    @endauth
</article>
{{-- END COMMENT --}}
<main>
    <div id="overlayDeleteBtnDialog{{ $id }}" class="z-10 opacity-0 pointer-events-none bg-black w-full h-screen fixed top-1/2 -right-1/2 -translate-x-1/2 -translate-y-1/2"></div>
    <article id="deleteCommentDialog{{ $id }}" class="opacity-0 z-20 pointer-events-none duration-150 fixed bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 bg-white shadow-lg p-5 rounded-xl dark:bg-slate-900 scale-110">
        <h1 class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-600 m-auto mb-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>                  
            Are you sure want to delete this Comment?
        </h1>
        <div class="mt-4 flex justify-center text-sm">
            <form action="/post-comment/delete/{{ $id }}" method="post">
                @csrf
                <button class="bg-red-600 text-white duration-150 p-2 rounded-md hover:bg-red-700">Yes, I'm sure</button>
            </form>
            <button onclick="cancelDeleteCommentDialogBtn({{ $id }})" class="bg-gray-50 p-2 rounded-md ml-3 hover:bg-gray-200 duration-150 dark:bg-slate-800">No, cancel</button>
        </div>
    </article>
</main>