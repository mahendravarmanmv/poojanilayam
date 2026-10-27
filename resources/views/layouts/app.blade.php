<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="theme-color"
        content="#76180f"
    >

    <meta
        name="description"
        content="@yield('meta_description', 'Pooja Go - Bringing devotion closer to your home.')"
    >
	
	<link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <title>
        @yield('title', 'Pooja Go')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')

</body>

</html>