<!DOCTYPE html>
<html lang="id">

<head>

    @include('layouts.partials.head')

    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])

</head>

<body>

    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <div id="mainLayout" class="main-layout">

        @include('layouts.partials.navbar')

        <div class="dashboard-layout">

            @include('layouts.partials.sidebar')

            <div id="mainContent" class="main-content">

                <main class="content-wrapper">

                    @yield('content')

                </main>

                @include('layouts.partials.footer')

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

    {{-- SweetAlert Flash Message --}}
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                confirmButtonColor: '#198754',
                timer: 1000,
                timerProgressBar: true,
                showConfirmButton: false
            });

        });
    </script>
    @endif

</body>

</html>