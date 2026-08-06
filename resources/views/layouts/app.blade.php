<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wisata Palembang')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-wisata">
        <div class="container">
            <a class="navbar-brand" href="{{ route('beranda') }}">
                <i class="bi bi-geo-alt-fill"></i> Palembang
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarWisata"
                aria-controls="navbarWisata" aria-expanded="false"
                aria-label="Buka menu navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarWisata">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('destinasi*') ? 'active' : '' }}" href="{{ route('destinasi') }}">Destinasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}" href="{{ route('tentang') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer-wisata">
    <div class="container">
        <div class="row footer-container gy-4">

            <div class="col-6 col-md-4 footer-col">
                <h4>Wisata Palembang</h4>
                <p>
                    Menyajikan informasi destinasi wisata, sejarah,
                    budaya, dan kuliner khas Kota Palembang untuk
                    setiap perjalanan wisata Anda.
                </p>
            </div>

            <div class="col-6 col-md-4 footer-col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="{{ route('destinasi') }}">Destinasi</a></li>
                    <li><a href="{{ route('tentang') }}">Tentang</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-4 footer-col">
                <h4>Hubungi Kami</h4>
                <p>Email: informasi@wisatapalembang.co.id</p>
                <p>WhatsApp: 0621-80581677</p>
            </div>

        </div>

        <p class="footer-copy">
            &copy; 2026 Wisata Palembang. Dibuat untuk keperluan pembelajaran pemrograman web pariwisata.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>