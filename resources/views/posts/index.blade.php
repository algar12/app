<x-app-layout title="Blog">
    <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col md:flex-row gap-8">
        <!-- Konten Utama -->
        <div class="w-full md:w-3/4">
            <livewire:post-list />
        </div>

        <!-- Sidebar -->
        <div id="side-bar"
            class="sticky top-0 h-screen col-span-4 px-3 py-6 pt-10 space-y-10 border-t border-gray-100 border-t-gray-100 md:border-t-none md:col-span-1 md:px-6 md:border-l">
            @include('posts.partials.search-box')

            @include('posts.partials.categories-box')
        </div>
    </div>
</x-app-layout>
