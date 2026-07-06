<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title','Desa Karangduwet')
    </title>

    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])
</head>

<body>
    @include('frontend.partials.navbar')
    <main>

        @yield('content')

    </main>
    @include('frontend.partials.footer')
</body>

</html>