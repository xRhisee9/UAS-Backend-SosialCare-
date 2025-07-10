<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts (Vite untuk Bootstrap CSS & JS, dan app.scss custom Anda) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex min-vh-100">
    <div id="wrapper" class="d-flex w-100">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">SosialCare Admin</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ Request::routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                @if(Auth::user()->is_admin())
                    <a href="{{ route('wargas.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('wargas.*') ? 'active' : '' }}">Warga</a>
                    <a href="{{ route('jenis-bantuan.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('jenis-bantuan.*') ? 'active' : '' }}">Jenis Bantuan</a>
                @endif
                <a href="{{ route('pengajuan.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('pengajuan.*') ? 'active' : '' }}">Pengajuan</a>
                <a href="{{ route('distribusi.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('distribusi.*') ? 'active' : '' }}">Distribusi</a>

                <form method="POST" action="{{ route('logout') }}" class="list-group-item list-group-item-action">
                    @csrf
                    <a class="text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </form>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-light navbar-admin">
                <div class="container-fluid">
                    <!-- Toggle button for small screens -->
                    <button class="btn btn-primary d-lg-none" id="sidebarToggle">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} ({{ Auth::user()->role }})
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                            Log Out
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show animated fadeIn" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show animated fadeIn" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle for small screens
            var sidebarToggle = document.getElementById("sidebarToggle");
            if (sidebarToggle) {
                sidebarToggle.addEventListener("click", function() {
                    document.getElementById("wrapper").classList.toggle("toggled");
                });
            }

            // Close alerts automatically after a few seconds
            setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    var bsAlert = bootstrap.Alert.getInstance(alert);
                    if (bsAlert) {
                        bsAlert.close();
                    } else {
                        // If not instantiated, manually remove after delay
                        alert.remove();
                    }
                });
            }, 5000); // 5000ms = 5 seconds
        });
    </script>
</body>
</html>