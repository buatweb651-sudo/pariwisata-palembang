<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --maroon: #7A1E1E;
            --maroon-dark: #5C1616;
            --gold: #C9A227;
            --gold-light: #E8C766;
            --bg-warm: #FBF7F0;
        }
        * { font-family: 'Poppins', sans-serif; }
        body { display: flex; min-height: 100vh; margin: 0; background: var(--bg-warm); }

        .sidebar {
            width: 240px;
            background: linear-gradient(180deg, var(--maroon) 0%, var(--maroon-dark) 100%);
            color: #fff;
            padding: 1.75rem 1.1rem;
            flex-shrink: 0;
            box-shadow: 3px 0 12px rgba(0,0,0,0.12);
        }
        .sidebar h5 {
            color: var(--gold-light);
            font-weight: 700;
            letter-spacing: 0.3px;
        }
        .sidebar h5 small { color: #fff9; font-weight: 400; }

        .sidebar a {
            color: #f1e9d8;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.65rem 0.9rem;
            border-radius: 8px;
            margin-bottom: 0.35rem;
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
        }
        .sidebar a i { font-size: 1.05rem; width: 1.2rem; text-align: center; }
        .sidebar a:hover {
            background: rgba(201, 162, 39, 0.18);
            color: #fff;
            transform: translateX(3px);
        }
        .sidebar a.active {
            background: rgba(201, 162, 39, 0.22);
            border-left: 3px solid var(--gold);
            color: #fff;
            font-weight: 600;
        }
        .sidebar hr { border-color: #ffffff2b; margin: 1.1rem 0; }
        .sidebar .back-link { color: #f1e9d8cc; font-size: 0.92rem; }
        .sidebar .back-link:hover { color: var(--gold-light); background: transparent; transform: translateX(0); }

        .main-content { flex: 1; }
        .topbar {
            background: #fff;
            padding: 1rem 1.75rem;
            border-bottom: 1px solid #eee0c4;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
        .topbar h5 { color: var(--maroon-dark); font-weight: 600; margin: 0; }
        .admin-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #fdf6e3;
            border: 1px solid var(--gold-light);
            color: var(--maroon-dark);
            padding: 0.35rem 0.9rem;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .admin-badge .avatar {
            width: 26px; height: 26px;
            border-radius: 50%;
            background: var(--maroon);
            color: var(--gold-light);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem; font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h5 class="mb-4">Siak Wisata <small class="d-block">Admin Panel</small></h5>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ route('destinasi') }}" class="{{ request()->routeIs('destinasi*') ? 'active' : '' }}">
            <i class="bi bi-geo-alt"></i> Kelola Destinasi
        </a>
        <a href="{{ route('atraksi') }}" class="{{ request()->routeIs('atraksi*') ? 'active' : '' }}">
            <i class="bi bi-stars"></i> Kelola Atraksi
            <a href="{{ route('kategori') }}">Kelola Kategori</a>
        </a>
        <a href="{{ route('user.index') }}" class="{{ request()->routeIs('user*') ? 'active' : '' }}">            <i class="bi bi-people"></i> Kelola User
        </a>
        <hr>
        <a href="{{ route('beranda') }}" class="back-link">
            <i class="bi bi-box-arrow-left"></i> Kembali ke Situs
        </a>
    </div>
    <div class="main-content">
        <div class="topbar">
            <h5>@yield('title')</h5>
            <span class="admin-badge">
                <span class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                {{ Auth::user()->name }} (Admin)
            </span>
        </div>
        <div class="p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>