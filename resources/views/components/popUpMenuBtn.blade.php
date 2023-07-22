<div class="w-full flex justify-end">
    <a href="/post/create" id="tweetPostBtn" class="pointer-events-none duration-300 ease-in-out fixed bottom-8 bg-white shadow-lg w-14 h-14 rounded-full flex items-center justify-center cursor-pointer hover:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800">
        <h1 class="opacity-0 duration-200 absolute right-16 bg-white shadow py-1.5 px-2 rounded-md text-sm dark:bg-slate-900">Create</h1>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
        </svg>                                    
    </a>
    <button id="lightModeBtn" class="pointer-events-none duration-300 ease-in-out fixed bottom-8 bg-white shadow-lg w-14 h-14 rounded-full flex items-center justify-center cursor-pointer hover:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800">
        <h1 class="opacity-0 duration-200 absolute whitespace-nowrap right-16 bg-white shadow py-1.5 px-2 rounded-md text-sm dark:bg-slate-900">Light Mode</h1>
        <svg id="lightIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 duration-200 opacity-100 absolute">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
        </svg>   
        <svg id="darkIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 duration-200 opacity-0 absolute">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
        </svg>                                                                            
    </button>
    <button onclick="popUpMenuBtn()" class="overflow-hidden text-white fixed bottom-8 bg-gradient-to-t from-sky-500 to-sky-400 shadow-lg w-14 h-14 rounded-full flex items-center justify-center cursor-pointer">
        <svg id="arrowIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="duration-200 w-6 h-6 absolute top-[30%]">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
        </svg>           
        <svg id="xIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="duration-200 w-6 h-6 absolute top-full">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>                      
    </button>
</div>
<script src="/js/components/popUpMenuBtn.js"></script>