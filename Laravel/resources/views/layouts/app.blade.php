<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Optimization & Favicon -->
    <title>@yield('title', 'ICLO - Pusat Ketenagakerjaan dan K3 Indonesia')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/icon.svg') }}">
    <meta name="description" content="@yield('meta_description', 'ICLO is Indonesia\'s premier authority on labour issues, OSH compliance auditing (SMK3), research, and ESG integration.')">
    <meta name="keywords" content="K3, OSH, Labour Standards Indonesia, SMK3 Audit, LSP ICLO, Occupational Safety, ESG Labour Compliance">
    <meta name="author" content="ICLO Indonesia">
    
    <!-- Open Graph Metadata -->
    <meta property="og:title" content="@yield('title', 'ICLO - Pusat Ketenagakerjaan dan K3 Indonesia')">
    <meta property="og:description" content="@yield('meta_description', 'ICLO is Indonesia\'s premier authority on labour standards, OSH compliance, and research.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    
    <!-- Google Fonts Integration -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Style Sheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Header Navigation -->
    <header>
        <div class="container nav-bar">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="logo-section" id="logo-link" style="display: flex; align-items: center; padding: 4px 0;">
                <img src="{{ asset('images/logo.svg') }}" alt="ICLO Logo" style="height: 72px; width: auto;" id="nav-logo-img">
            </a>

            <!-- Navigation Links -->
            <nav>
                <ul class="nav-links" id="nav-links">
                    <li class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" id="nav-home-btn">{{ __('nav_home') }}</a>
                    </li>
                    <li class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        <a href="{{ route('about') }}" id="nav-about-btn">{{ __('nav_about') }}</a>
                    </li>
                    <li class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">
                        <a href="{{ route('services') }}" id="nav-services-btn">{{ __('nav_services') }}</a>
                    </li>
                    <li class="nav-link {{ request()->routeIs('sectors') ? 'active' : '' }}">
                        <a href="{{ route('sectors') }}" id="nav-sectors-btn">{{ __('nav_sectors') }}</a>
                    </li>
                    <li class="nav-link dropdown {{ request()->routeIs('resources') || request()->routeIs('articles.index') || request()->routeIs('articles.show') ? 'active' : '' }}">
                        <a href="javascript:void(0)" id="nav-insights-btn" style="display: flex; align-items: center;">
                            @if(app()->getLocale() === 'id') Publikasi @else Publications @endif
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 4px;"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('resources') }}" id="nav-resources-btn">{{ __('nav_resources') }}</a></li>
                            <li><a href="{{ route('articles.index') }}" id="nav-articles-btn">{{ __('nav_articles') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}" id="nav-contact-btn">{{ __('nav_contact') }}</a>
                    </li>
                </ul>
            </nav>

            <!-- Navigation Actions (Desktop view) -->
            <div class="nav-actions">
                <div class="lang-switch">
                    <a href="{{ route('locale.switch', 'id') }}" class="lang-btn {{ app()->getLocale() === 'id' ? 'active' : '' }}" id="lang-desktop-id" style="display: flex; align-items: center; gap: 6px;">
                        <img src="https://flagcdn.com/id.svg" width="20" style="border-radius: 2px; border: 1px solid rgba(0,0,0,0.1);" alt="ID"> ID
                    </a>
                    <a href="{{ route('locale.switch', 'en') }}" class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}" id="lang-desktop-en" style="display: flex; align-items: center; gap: 6px;">
                        <img src="https://flagcdn.com/gb.svg" width="20" style="border-radius: 2px; border: 1px solid rgba(0,0,0,0.1);" alt="EN"> EN
                    </a>
                </div>
                <a href="{{ route('contact') }}" class="btn btn-primary" id="nav-desktop-cta-btn">{{ __('nav_cta_advisory') }}</a>
                <button class="mobile-menu-toggle" id="mobile-toggle" aria-label="Toggle menu">☰</button>
            </div>
        </div>
    </header>

    <!-- Main Dynamic Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container footer-grid" style="padding-top: 40px; padding-bottom: 40px;">
            <div class="footer-column footer-about">
                <div class="logo-section" style="margin-bottom: 16px;">
                    <img src="{{ asset('images/logo-light.svg') }}" alt="ICLO Logo" style="height: 70px; width: auto;" id="footer-logo-img">
                </div>
                <p> Indonesia's Centre of Excellence for Responsible Employment and Workplace Safety</p>
                <p style="color: var(--accent); font-weight: 600; margin-top: 12px;">"{{ __('tagline') }}"</p>
            </div>
            
            <div class="footer-column">
                <h4>{{ __('footer_quick_links') }}</h4>
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('nav_home') }}</a></li>
                    <li><a href="{{ route('about') }}">{{ __('nav_about') }}</a></li>
                    <li><a href="{{ route('services') }}">{{ __('nav_services') }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('nav_contact') }}</a></li>
                    <li><a href="{{ route('articles.index') }}">{{ __('nav_articles') }}</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>{{ __('nav_sectors') }}</h4>
                <ul>
                    <li><a href="{{ route('sectors') }}">Mining & Smelters</a></li>
                    <li><a href="{{ route('sectors') }}">Palm Oil / Agriculture</a></li>
                    <li><a href="{{ route('sectors') }}">Manufacturing</a></li>
                    <li><a href="{{ route('sectors') }}">Energy & Infrastructure</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>{{ __('footer_contact') }}</h4>
                <ul style="color: rgba(248, 250, 252, 0.75); font-size: 14px; display: flex; flex-direction: column; gap: 8px;">
                    <li><strong>Address:</strong> Menara Astra, Lantai 37 Jl. Jend. Sudirman Kav. 5–6 Jakarta Pusat 10220 Indonesia</li>
                    <li><strong>Email:</strong> info@iclo.co.id</li>
                    <li><strong>Phone:</strong> +62 818-2288-288</li>
                    <li><strong>Support:</strong> support@iclo.co.id</li>
                </ul>
            </div>
        </div>
        
        <div class="container footer-bottom">
            <div>{{ __('footer_copyright') }}</div>
            <div style="display: flex; gap: 20px; align-items: center;" class="social-links">
                <a href="#" aria-label="Instagram" style="color: rgba(255,255,255,0.7); font-size: 20px; transition: color 0.3s;" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" aria-label="LinkedIn" style="color: rgba(255,255,255,0.7); font-size: 20px; transition: color 0.3s;" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" aria-label="Facebook" style="color: rgba(255,255,255,0.7); font-size: 20px; transition: color 0.3s;" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" aria-label="TikTok" style="color: rgba(255,255,255,0.7); font-size: 20px; transition: color 0.3s;" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="#" aria-label="YouTube" style="color: rgba(255,255,255,0.7); font-size: 20px; transition: color 0.3s;" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </footer>

    <!-- Custom Script File -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
