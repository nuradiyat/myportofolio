<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    @include('partials.meta')
    @if ($profile?->logo_website)
        <link rel="icon" type="image/png" sizes="32x32" href="{{ Storage::url($profile->logo_website) }}">
        <link rel="apple-touch-icon" href="{{ Storage::url($profile->logo_website) }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body
    class="min-h-screen overflow-x-hidden bg-white text-gray-900 antialiased selection:bg-blue-600 selection:text-white">

    <x-navbar />

    <main class="w-full overflow-x-hidden">
        @yield('content')
    </main>

    <x-footer />

    @include('partials.scripts')
    @stack('scripts')

</body>

</html>