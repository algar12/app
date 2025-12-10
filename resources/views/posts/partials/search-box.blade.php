<div x-data="{
    query: '{{ request('search', '') }}'
}" x-on:keyup.enter.window="$dispatch('search',{
    search : query
})" id="search-box" class="bg-white p-4 sm:p-5 lg:p-6 rounded-lg sm:rounded-xl border border-gray-100 shadow-sm">
    <h3 class="text-base sm:text-lg font-bold font-serif text-gray-900 mb-3 sm:mb-4">{{ __('blog.search') }}</h3>
    <div class="relative">
        <input x-model="query" type="text" placeholder="{{ __('blog.search_placeholder') }}"
            class="w-full pl-3 sm:pl-4 pr-9 sm:pr-10 py-2 rounded-lg border border-gray-300 focus:border-news-blue focus:ring focus:ring-news-blue/20 text-xs sm:text-sm">
        <button x-on:click="$dispatch('search',{ search : query })"
            class="absolute right-2 sm:right-3 top-2.5 text-gray-400 hover:text-news-blue">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
    </div>
</div>