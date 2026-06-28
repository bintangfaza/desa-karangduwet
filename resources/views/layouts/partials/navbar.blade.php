<nav class="admin-navbar">

    <div class="navbar-left">

        <button id="toggleSidebar" class="toggle-btn">

            <i id="toggleIcon" class="bi bi-list"></i>

        </button>

        <img
            src="{{ asset('assets/logo/logo.png') }}"
            class="navbar-logo">

        <div class="navbar-brand">

            <h4>Desa Karangduwet</h4>

            <small>Sistem Informasi Desa</small>

        </div>

    </div>

    <div class="navbar-right">

        <i class="bi bi-person-circle"></i>

        <div class="navbar-user">

            <strong>

                {{ auth()->user()->nama }}

            </strong>

            <span>Administrator</span>

        </div>

    </div>

</nav>