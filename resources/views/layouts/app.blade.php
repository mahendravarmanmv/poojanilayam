<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

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
        content="@yield('meta_description', 'Pooja Nilayam - Bringing devotion closer to your home.')"
    >

    <title>
        @yield('title', 'Pooja Nilayam')
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

</body>

</html>