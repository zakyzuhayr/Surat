<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('costume_css/main.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">
                <img src="{{ asset('gambar/Logo.jpg') }}" class="gambar_logo_admin" alt="">
                E-SURAT
            </div>
            <div class="list-group list-group-flush">
                @if (Auth::user()->hasRole('admin'))
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->routeIs('beranda') ? 'active' : '' }}"
                        href="{{ route('beranda') }}">Beranda</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->routeIs('pengaturan') ? 'active' : '' }}"
                        href="{{ route('pengaturan') }}">Pengaturan</a>
                @endif

                <div class="btn-group dropend">
                    <button type="button"
                        class="dropdown-toggle list-group-item list-group-item-action list-group-item-light p-3 {{ request()->routeIs('surat_masuk') || request()->routeIs('surat_keluar') ? 'active' : '' }}"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Persuratan
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('surat_masuk') }}">Surat Masuk</a></li>
                        <li><a class="dropdown-item" href="{{ route('surat_keluar') }}">Surat Keluar</a></li>
                    </ul>
                </div>
                {{-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Laporan</a> --}}
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li> --}}
                            <li class="nav-item">
                                <span>{{Auth::user()->name}}</span>
                                {{-- <div class="btn-group">
                                    <button type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-display="static" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-lg-end">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <div class="loading_page">
                    <div class="loader"></div>
                </div>
                @yield('content')

            </div>
        </div>
    </div>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('costume_js/toggle_menu.js') }}"></script>
<script src="{{ asset('costume_js/loading.js') }}"></script>


</html>
