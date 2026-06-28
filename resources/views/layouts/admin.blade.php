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
</body>

</html>