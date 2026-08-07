<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $siteSettings?->site_name ?? config('app.name') }}</title>
    <meta name="description" content="{{ $siteSettings?->tagline }}">

    @if ($siteSettings?->logo)
        <link rel="icon" href="{{ asset('storage/'.$siteSettings->logo) }}">
    @endif

    @fonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream text-onlight font-sans antialiased">
    @include('partials.site.nav')

    <main>
        {{ $slot }}
    </main>

    @include('partials.site.footer')
</body>
</html>
