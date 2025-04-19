@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' - ' : '' }}{{ config('app.name', 'IPNU IPPNU Tanjungharjo') }}</title>
    
    <meta name="description" content="{{ isset($description) ? $description : 'Website resmi IPNU IPPNU Tanjungharjo, tempat pelajar berkarya dan berbagi informasi.' }}">
    <meta name="keywords" content="IPNU, IPPNU, Tanjungharjo, Organisasi, Pelajar, Pendidikan">
    <meta name="author" content="IPNU IPPNU Tanjungharjo">
    <meta property="og:title" content="{{ isset($title) ? $title . ' - ' : '' }}{{ config('app.name', 'IPNU IPPNU Tanjungharjo') }}">
    <meta property="og:description" content="{{ isset($description) ? $description : 'Website resmi IPNU IPPNU Tanjungharjo.' }}">
    <meta property="og:image" content="{{ asset('android-chrome-512x512.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "IPNU IPPNU Tanjungharjo",
  "url": "https://pripnuippnutanjungharjo.my.id",
  "logo": "{{ asset('android-chrome-512x512.png') }}",
  "sameAs": [
    "https://www.instagram.com/pr.ipnu_ippnu_tanjungharjo/",
    "https://www.facebook.com/ipnuippnu.tanjungharjo",
    "https://www.tiktok.com/@ipnuippnutanjungharjo"
  ]
}
</script>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <!-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}"> -->
        <!-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}"> -->
        <!-- <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}"> -->
        <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}">
        <!-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> -->
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ secure_asset('js/filament/widgets/components/chart.js') }}"></script>
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    @include('layouts.partial.header')

    @yield('hero')

    <main class="container flex flex-grow px-5 mx-auto">
        {{ $slot }}
    </main>

    @include('layouts.partial.footer')

    @stack('modals')
    @livewireScripts
</body>

</html>