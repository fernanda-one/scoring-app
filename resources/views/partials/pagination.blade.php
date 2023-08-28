<nav class="flex items-center justify-between align-middle flex-shrink-0 pt-4 my-3" aria-label="Table navigation">
    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white"> {{ $paginator->firstItem()}} - {{ $paginator->lastItem() }} </span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total()}}</span></span>
    <ul class="inline-flex items-center -space-x-px">
{{--         Previous Page Link--}}
        @if ($paginator->onFirstPage())
            <li>
                <span class="flex space-x-3 justify-between items-center px-6 py-3 bg-blueDark rounded-md text-white cursor-not-allowed"  >
                    <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.62706 0.409901C8.89143 0.67244 9.03994 1.02847 9.03994 1.3997C9.03994 1.77093 8.89143 2.12696 8.62706 2.3895L3.98327 6.9997L8.62706 11.6099C8.88394 11.8739 9.02608 12.2276 9.02286 12.5947C9.01965 12.9617 8.87134 13.3129 8.60988 13.5724C8.34842 13.832 7.99472 13.9793 7.62497 13.9824C7.25522 13.9856 6.899 13.8445 6.63303 13.5895L0.992233 7.9895C0.727862 7.72696 0.579346 7.37093 0.579346 6.9997C0.579346 6.62847 0.727862 6.27244 0.992233 6.0099L6.63303 0.409901C6.89749 0.147442 7.25611 0 7.63005 0C8.00398 0 8.36261 0.147442 8.62706 0.409901Z" fill="black"/>
                    </svg>
                    <span>Previous</span>
                </span>
            </li>
        @else
            <li class="page-item">
                <a class="flex space-x-3 justify-between items-center px-6 py-3 bg-blueDark rounded-md text-white" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.62706 0.409901C8.89143 0.67244 9.03994 1.02847 9.03994 1.3997C9.03994 1.77093 8.89143 2.12696 8.62706 2.3895L3.98327 6.9997L8.62706 11.6099C8.88394 11.8739 9.02608 12.2276 9.02286 12.5947C9.01965 12.9617 8.87134 13.3129 8.60988 13.5724C8.34842 13.832 7.99472 13.9793 7.62497 13.9824C7.25522 13.9856 6.899 13.8445 6.63303 13.5895L0.992233 7.9895C0.727862 7.72696 0.579346 7.37093 0.579346 6.9997C0.579346 6.62847 0.727862 6.27244 0.992233 6.0099L6.63303 0.409901C6.89749 0.147442 7.25611 0 7.63005 0C8.00398 0 8.36261 0.147442 8.62706 0.409901Z" fill="black"/>
                    </svg>
                    <span>Previous</span>
                </a>
            </li>
        @endif

{{--         Pagination Elements--}}
{{--        @foreach ($elements as $element)--}}

{{--            @if (is_string($element))--}}
{{--                <li class="page-item disabled px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>--}}
{{--            @endif--}}

{{--             Array Of Links--}}
{{--            @if (is_array($element))--}}
{{--                @foreach ($element as $page => $url)--}}
{{--                    @if ($page == $paginator->currentPage())--}}
{{--                        <li class="page-item active" aria-current="page"><span class="page-link z-10 px-3 py-2 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span></li>--}}
{{--                    @else--}}
{{--                        <li class="page-item "><a class="page-link px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--         Next Page Link--}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="flex space-x-3 justify-between items-center px-6 py-3 bg-blueDark rounded-md text-white ml-6" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <span>Next</span>
                    <svg width="10" height="15" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.02527 9.70692C0.83643 9.51939 0.730347 9.26508 0.730347 8.99992C0.730347 8.73475 0.83643 8.48045 1.02527 8.29292L4.34226 4.99992L1.02527 1.70692C0.841781 1.51832 0.740252 1.26571 0.742547 1.00352C0.744842 0.741321 0.850778 0.490509 1.03754 0.305101C1.2243 0.119692 1.47694 0.0145233 1.74104 0.0122448C2.00515 0.00996641 2.25959 0.110761 2.44957 0.292919L6.47871 4.29292C6.66755 4.48045 6.77363 4.73475 6.77363 4.99992C6.77363 5.26508 6.66755 5.51939 6.47871 5.70692L2.44957 9.70692C2.26067 9.89439 2.00451 9.99971 1.73742 9.99971C1.47032 9.99971 1.21416 9.89439 1.02527 9.70692Z" fill="black"/>
                    </svg>
                </a>
            </li>
        @else
            <li class="page-item" aria-label="@lang('pagination.next')">
                <span class="flex space-x-3 justify-between items-center px-6 py-3 bg-blueDark rounded-md text-white ml-6 cursor-not-allowed"  >
                    <span>Next</span>
                    <svg width="10" height="14" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" clip-rule="evenodd" d="M1.02527 9.70692C0.83643 9.51939 0.730347 9.26508 0.730347 8.99992C0.730347 8.73475 0.83643 8.48045 1.02527 8.29292L4.34226 4.99992L1.02527 1.70692C0.841781 1.51832 0.740252 1.26571 0.742547 1.00352C0.744842 0.741321 0.850778 0.490509 1.03754 0.305101C1.2243 0.119692 1.47694 0.0145233 1.74104 0.0122448C2.00515 0.00996641 2.25959 0.110761 2.44957 0.292919L6.47871 4.29292C6.66755 4.48045 6.77363 4.73475 6.77363 4.99992C6.77363 5.26508 6.66755 5.51939 6.47871 5.70692L2.44957 9.70692C2.26067 9.89439 2.00451 9.99971 1.73742 9.99971C1.47032 9.99971 1.21416 9.89439 1.02527 9.70692Z" fill="black"/>
                    </svg>
                </span>
            </li>
        @endif
    </ul>
</nav>
