<header x-data="{ open: false, categoryOpen: false, scrolled: false }"
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    class="sticky top-0 z-50 w-full transition-all duration-300 ease-in-out border-b border-transparent"
    :class="{ 'bg-white shadow-sm': !scrolled, 'bg-white/95 backdrop-blur-md border-gray-200/50 shadow-md': scrolled }">
    @include('navigation-menu')
</header>