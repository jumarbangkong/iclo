<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - ICLO Admin</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icon.svg') }}">
    <!-- Use original style.css and new admin.css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body">

    <!-- Sidebar Navigation -->
    <aside class="admin-sidebar" id="sidebarMenu">
        <div class="admin-sidebar-brand" style="padding: 20px 24px; display: flex; flex-direction: column; gap: 4px; align-items: flex-start;">
            <img src="{{ asset('images/logo-light.svg') }}" alt="ICLO Logo" style="height: 45px; width: auto;" id="sidebar-logo-img">
            <span style="font-size: 11px; text-transform: uppercase; letter-spacing: 2px; color: var(--accent); font-weight: bold; margin-left: 4px;">Control Panel</span>
        </div>
        
        <ul class="admin-sidebar-menu">
            <li class="admin-sidebar-item">
                <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    🏠 Dashboard Overview
                </a>
            </li>
            <li class="admin-sidebar-item">
                <a href="{{ route('admin.articles.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                    📄 Kelola Artikel
                </a>
            </li>

            <li class="admin-sidebar-item">
                <a href="{{ route('admin.authors.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.authors.*') ? 'active' : '' }}">
                    ✍️ Kelola Penulis (Author)
                </a>
            </li>
            <li class="admin-sidebar-item">
                <a href="{{ route('admin.resources.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.resources.*') ? 'active' : '' }}">
                    📚 Kelola Resources
                </a>
            </li>
            <li class="admin-sidebar-item">
                <a href="{{ route('admin.contacts.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    📬 Kontak Masuk
                </a>
            </li>
            <li class="admin-sidebar-item">
                <a href="{{ route('admin.sectors.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.sectors.*') ? 'active' : '' }}">
                    🏭 Kelola Sektor Industri
                </a>
            </li>
            <li class="admin-sidebar-item" style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 16px;">
                <a href="{{ route('articles.index') }}" class="admin-sidebar-link" target="_blank">
                    🌐 Lihat Web Artikel
                </a>
            </li>
            <li class="admin-sidebar-item">
                <a href="{{ route('home') }}" class="admin-sidebar-link" target="_blank">
                    🏢 Halaman Utama
                </a>
            </li>
        </ul>
        
        <div class="admin-sidebar-footer">
            <div style="font-size: 11px; color: rgba(255,255,255,0.5);">Login sebagai:</div>
            <div style="font-size: 13px; font-weight: 600; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                {{ Auth::user()->name }}
            </div>
        </div>
    </aside>

    <!-- Main Content Panel Wrapper -->
    <div class="admin-content-wrapper">
        
        <!-- Header -->
        <header class="admin-header">
            <div style="display: flex; align-items: center; gap: 16px;">
                <button id="sidebarToggle" class="admin-btn admin-btn-secondary admin-btn-mini" style="display: none; padding: 6px 12px; font-size: 16px; cursor: pointer;">
                    ☰
                </button>
                <div class="admin-header-title">@yield('title')</div>
            </div>
            
            <div class="admin-user-menu">
                <a href="{{ route('admin.profile.edit') }}" class="admin-user-name" style="text-decoration: none; color: var(--text-dark);" title="Pengaturan Akun">
                    ⚙️ {{ Auth::user()->email }}
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="admin-logout-btn">Keluar</button>
                </form>
            </div>
        </header>
        
        <!-- Main Area -->
        <main class="admin-main-container">
            <!-- Alert Messages -->
            @if(session('success'))
                <div class="admin-alert admin-alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="admin-alert admin-alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
        
    </div>

    <!-- Toggle scripts for responsiveness -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebarMenu');
            
            // Show toggle button on small screens
            function checkWidth() {
                if (window.innerWidth <= 768) {
                    toggleBtn.style.display = 'block';
                } else {
                    toggleBtn.style.display = 'none';
                    sidebar.classList.remove('open');
                }
            }
            
            window.addEventListener('resize', checkWidth);
            checkWidth();
            
            toggleBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                sidebar.classList.toggle('open');
            });
            
            document.addEventListener('click', function(e) {
                if (sidebar.classList.contains('open') && !sidebar.contains(e.target) && e.target !== toggleBtn) {
                    sidebar.classList.remove('open');
                }
            });
        });
    </script>
</body>
</html>
