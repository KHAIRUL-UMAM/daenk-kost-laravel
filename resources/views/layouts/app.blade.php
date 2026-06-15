<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daenk Kost Jambi - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #343a40; color: white; }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 10px 20px; display: block; }
        .sidebar a:hover, .sidebar a.active { background: #495057; color: white; }
        .navbar { background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075); }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @auth
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar d-none d-md-block">
                <div class="p-3 text-center">
                    <h4>Daenk Kost</h4>
                    <hr>
                </div>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a href="{{ route('kamar.index') }}" class="{{ request()->routeIs('kamar.*') ? 'active' : '' }}">
                    <i class="fas fa-door-open me-2"></i> Manajemen Kamar
                </a>
                <a href="{{ route('penyewa.index') }}" class="{{ request()->routeIs('penyewa.*') ? 'active' : '' }}">
                    <i class="fas fa-users me-2"></i> Manajemen Penyewa
                </a>
                <a href="{{ route('pembayaran.index') }}" class="{{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
                    <i class="fas fa-money-bill-wave me-2"></i> Pembayaran
                </a>
                <a href="{{ route('laporan.index') }}" class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt me-2"></i> Laporan
                </a>
                <div class="mt-5 px-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
            @endauth

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 ms-sm-auto px-0">
                @auth
                <nav class="navbar navbar-expand-lg mb-4 px-3">
                    <div class="container-fluid">
                        <span class="navbar-brand">Sistem Pengelolaan Kost</span>
                        <div class="ms-auto">
                            <span class="me-3"><i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </nav>
                @endauth

                <div class="container-fluid px-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
