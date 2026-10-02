<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - ICLO</title>
    <!-- Use main style.css for CSS variables and styling base -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-glass-card">
            <div class="login-logo" style="margin-bottom: 24px;">
                <img src="{{ asset('images/logo-light.svg') }}" alt="ICLO Logo" style="height: 60px; width: auto; margin-bottom: 12px;" id="login-logo-img">
                <h1 class="login-title" style="font-size: 20px;">Control Panel Admin</h1>
                <p class="login-subtitle">Silakan masuk untuk mengelola artikel & penulis</p>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="admin-alert admin-alert-error" style="margin-bottom: 20px;">
                    <ul style="margin: 0; padding-left: 16px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="admin-alert admin-alert-success" style="margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                
                <div class="admin-form-group">
                    <label for="email" class="admin-form-label" style="color: white; font-weight: 500;">Alamat Email</label>
                    <input type="email" name="email" id="email" class="login-form-input" placeholder="admin@iclo.or.id" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="admin-form-group" style="margin-bottom: 30px;">
                    <label for="password" class="admin-form-label" style="color: white; font-weight: 500;">Password</label>
                    <input type="password" name="password" id="password" class="login-form-input" placeholder="••••••••" required>
                </div>

                <button type="submit" class="login-btn">Masuk Sistem</button>
            </form>
            
            <div style="margin-top: 12px; text-align: center;">
                <a href="{{ route('home') }}" style="font-size: 12px; color: rgba(255,255,255,0.6); text-decoration: underline;">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</html>
