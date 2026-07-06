<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title', 'Admin') | Desa Karangduwet</title>

<meta name="description" content="Website Resmi Desa Karangduwet">

{{-- Favicon --}}
<link rel="icon" href="{{ asset('assets/favicon/favicon.ico') }}" type="image/x-icon">

{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

{{-- CSS --}}
@vite([
    'resources/css/app.css',
    'resources/js/app.js'
])

@stack('styles')