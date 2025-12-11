@props(['title', 'description' => null, 'image' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' - ' : '' }}{{ config('app.name', 'Kabar Rakyat') }}</title>

    <meta name="description"
        content="{{ $description ?? 'Kabar Rakyat - Portal berita terkini, tajam, dan terpercaya. Menyajikan informasi aktual dari seluruh penjuru Indonesia.' }}">
    <meta name="keywords" content="Berita, Kabar Rakyat, Politik, Ekonomi, Olahraga, Teknologi, Indonesia">
    <meta name="author" content="Kabar Rakyat">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="{{ isset($title) ? $title . ' - ' : '' }}{{ config('app.name', 'Kabar Rakyat') }}">
    <meta property="og:description"
        content="{{ $description ?? 'Kabar Rakyat - Portal berita terkini, tajam, dan terpercaya.' }}">
    <meta property="og:image" content="{{ $image ?? asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
        content="{{ isset($title) ? $title . ' - ' : '' }}{{ config('app.name', 'Kabar Rakyat') }}">
    <meta name="twitter:description"
        content="{{ $description ?? 'Kabar Rakyat - Portal berita terkini, tajam, dan terpercaya.' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('images/logo.png') }}">

    <!-- Google Site Verification (Uncomment and add your code below) -->
    <!-- <meta name="google-site-verification" content="YOUR_VERIFICATION_CODE_HERE" /> -->

    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "NewsMediaOrganization",
      "name": "Kabar Rakyat",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo.png') }}",
      "sameAs": [
        "https://www.instagram.com/kabarrakyat",
        "https://www.facebook.com/kabarrakyat",
        "https://www.twitter.com/kabarrakyat"
      ]
    }
    </script>

    <link rel="icon" href="{{ asset('images/favicon-large.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon-large.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- PWA -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#E11D48">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ secure_asset('js/filament/widgets/components/chart.js') }}"></script>
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-paper text-gray-900">
    <x-banner />

    @include('layouts.partial.header')

    @yield('hero')

    <main class="container flex flex-grow px-5 mx-auto">
        {{ $slot }}
    </main>

    @include('layouts.partial.footer')

    @stack('modals')
    @livewireScripts

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then((reg) => console.log('SW registered!', reg))
                    .catch((err) => console.log('SW registration failed', err));
            });
        }
    </script>
</body>

</html>