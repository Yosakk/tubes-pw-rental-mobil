<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    {{-- favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-favicon.png') }}">

    <style>
        body {
            background-color: #F8F7FC;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .profile-pic {
            height: 30px;
        }
    </style>
</head>

<body>
    <div class="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid px-3">
                <span class="navbar-brand d-lg-none d-md-block d-sm-block fw-bold">
                    <img height="30" src="{{ asset('images/logo.png') }}" alt="logo">
                    - Admin
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item d-lg-block d-md-none d-sm-none">
                            <a class="fw-bold">
                                <img height="30" src="{{ asset('images/logo.png') }}" alt="logo">
                            </a>
                        </li>
                         <li class="nav-item d-lg-none d-md-block d-sm-block">
                        <a href="{{ url('/landing-page-admin') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item d-lg-none d-md-block d-sm-block">
                            <a href="{{ url('/profileAdmin') }}" class="nav-link">Profile Admin</a>
                        </li>
                        <li class="nav-item d-lg-none d-md-block d-sm-block">
                            <a href="{{ url('/dataUser') }}" class="nav-link">Data User</a>
                        </li>
                        <li class="nav-item d-lg-none d-md-block d-sm-block">
                            <a href="{{ url('/data-mobil') }}" class="nav-link">Data Mobil</a>
                        </li>
                        <li class="nav-item d-lg-none d-md-block d-sm-block">
                            <a href="{{ url('/dataTransaksi') }}" class="nav-link">Data Transaksi</a>
                        </li>
                        <li class="nav-item d-lg-none d-md-block d-sm-block">
                            <a href="{{ url('/landing-no-user') }}" class="text-danger fw-bold">Log Out</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-none d-md-flex">
                        {{-- <li class="nav-item">
                            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmation">Log Out</a>
                        </li> --}}
                        <li class="nav-item d-sm-none d-md-none d-lg-block">
                            <a href="#" class="nav-link" role="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                <i class="navbar-toggler-icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- confirm logout --}}
        {{-- <div class="modal fade bd-example-modal-sm" id="confirmation" tabindex="0" role="dialog"
            aria-labelledby="confirmation" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <p class="modal-title fs-6 text-white" id="confirmationLabel">Apakah ingin logout?</p>
                        <button type="button" class="close btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="{{ url('/') }}" role="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmation">Logout</a>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header mt-2">
                <h4 class="offcanvas-title fw-bold" id="offcanvasScrollingLabel">Admin Dashboard</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="offcanvas-header">
                <h5 class="offcanvas-title px-2 fs-30">
                    <img src="{{ asset('images/profilepic.png') }}" alt="Profile pic"
                        class="profile-pic rounded-circle"> admin1
                </h5>
            </div>
            <hr>
            <div class="offcanvas-body">
                <div class="container-fluid">
                    <div class="row gx-2 gy-2 mb-auto">
                        <a href="{{ url('/landing-page-admin') }}" class="h5 btn btn-light">Home</a>
                        <a href="{{ url('/profileAdmin') }}" class="h5 btn btn-light">Profile</a>
                        <a href="{{ url('/dataUser') }}" class="h5 btn btn-light">Data User</a>
                        <a href="{{ url('/data-mobil') }}" class="h5 btn btn-light">Data Mobil</a>
                        <a href="{{ url('/dataTransaksi') }}" class="h5 btn btn-light">Data Transaksi</a>
                    </div>
                    <div class="justify-content-end d-flex">
                        <a href="{{ url('/landing-no-user') }}"
                            class="btn btn-danger align-items-end d-flex position-absolute bottom-0 mb-2">Log
                            Out</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
