<div {{ $attributes->merge(['class' => 'flex justify-center items-center']) }}>
    <div class="relative">
        <!-- Outer Ring -->
        <div class="w-12 h-12 rounded-full absolute border-4 border-solid border-gray-200"></div>

        <!-- Inner Spinning Ring -->
        <div
            class="w-12 h-12 rounded-full animate-spin absolute border-4 border-solid border-news-blue border-t-transparent shadow-md">
        </div>

        <!-- Center Dot (Optional, for extra detail) -->
        <div class="w-12 h-12 flex items-center justify-center">
            <div class="w-2 h-2 bg-news-red rounded-full animate-pulse"></div>
        </div>
    </div>
</div>