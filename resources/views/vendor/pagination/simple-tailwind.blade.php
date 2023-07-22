@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="opacity-0 pointer-events-none relative inline-flex items-center px-4 py-2 text-sm font-medium text-black dark:text-white bg-white dark:bg-slate-950 border border-gray-200 dark:border-slate-900 cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-black dark:text-white bg-white dark:bg-slate-950 border border-gray-200 dark:border-slate-900 leading-5 hover:bg-gray-100 rounded-md focus:ring ring-gray-200 dark:hover:bg-slate-900 dark:ring-slate-800 duration-150">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-black dark:text-white bg-white dark:bg-slate-950 border border-gray-200 dark:border-slate-900 leading-5 rounded-md hover:bg-gray-100 focus:ring ring-gray-200 dark:hover:bg-slate-900 dark:ring-slate-800 duration-150">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="opacity-0 pointer-events-none relative inline-flex items-center px-4 py-2 text-sm font-medium text-black dark:text-white bg-white dark:bg-slate-950 border border-gray-200 dark:border-slate-900 cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
