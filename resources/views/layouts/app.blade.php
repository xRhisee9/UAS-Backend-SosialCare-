<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        #wrapper {
            display: flex;
            width: 100%;
        }
        #sidebar-wrapper {
            min-width: 250px;
            max-width: 250px;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
            position: sticky;
            top: 0;
            height: 100vh; /* Make sidebar take full height */
            overflow-y: auto; /* Enable scrolling for long content */
        }
        #sidebar-wrapper .sidebar-heading {
            padding: 1.00rem 1.25rem;
            font-size: 1.2rem;
            background-color: #212529;
            color: #fff;
        }
        #sidebar-wrapper .list-group {
            width: 100%;
        }
        #sidebar-wrapper .list-group-item {
            border: none;
            background-color: #343a40;
            color: #adb5bd;
            padding: 1rem 1.5rem;
            display: block;
            text-decoration: none;
        }
        #sidebar-wrapper .list-group-item:hover {
            background-color: #495057;
            color: #fff;
        }
        #sidebar-wrapper .list-group-item.active {
            background-color: #007bff;
            color: #fff;
        }
        #page-content-wrapper {
            width: 100%;
        }
        .navbar-admin {
            border-bottom: 1px solid #dee2e6;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div id="wrapper">
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

                <form method="POST" action="{{ route('logout') }}" class="list-group-item list-group-item-action text-danger" style="cursor: pointer;">
                    @csrf
                    <a class="text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 this.closest('form').submit();">
                        Logout
                    </a>
                </form>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light navbar-admin">
                <div class="container-fluid">
                    <button class="btn btn-primary d-block d-lg-none" id="sidebarToggle">Toggle Menu</button>
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
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        </div>

    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    </script>
</body>
</html>