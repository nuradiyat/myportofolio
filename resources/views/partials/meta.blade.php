<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>
    @yield('title', 'Muhammad Nuradiyat | Web Developer')
</title>

<meta name="description" content="@yield('meta_description', 'Website portofolio Muhammad Nuradiyat.')">

<meta name="keywords" content="Laravel, PHP, Web Developer, Portfolio, Filament, Tailwind CSS">

<meta name="author" content="Muhammad Nuradiyat">

<meta name="robots" content="index, follow">

<meta name="theme-color" content="#2563EB">

<link rel="icon" href="{{ asset('favicon.ico') }}">

<link rel="canonical" href="{{ url()->current() }}">

{{-- Open Graph --}}

<meta property="og:type" content="website">

<meta property="og:title" content="@yield('title', 'Muhammad Nuradiyat | Web Developer')">

<meta property="og:description" content="@yield('meta_description', 'Website portofolio Muhammad Nuradiyat.')">

<meta property="og:url" content="{{ url()->current() }}">

<meta property="og:image" content="{{ asset('images/logo/og-image.png') }}">
