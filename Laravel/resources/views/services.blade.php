@extends('layouts.app')

@section('title', 'Layanan Kami - ICLO')

@section('content')
<!-- Header Banner -->
<section class="hero-premium" style="min-height: 400px; height: 50vh;">
    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2070&auto=format&fit=crop" alt="Industrial Services" class="hero-premium-bg">
    <div class="hero-premium-overlay"></div>
    <div class="hero-premium-content container" style="padding-top: 0;">
        <span class="premium-label" style="color: var(--accent); margin-bottom: 20px;">@if(app()->getLocale() === 'id') Kompetensi Nasional @else National Competencies @endif</span>
        <h1 class="hero-title-main" style="margin-bottom: 16px;">@if(app()->getLocale() === 'id') Layanan Utama Kami @else Our Core Services @endif</h1>
        <p class="hero-subtitle-main" style="max-width: 700px; margin: 0 auto;">
            @if(app()->getLocale() === 'id') Temukan penawaran layanan khusus kami yang dirancang untuk membangun kepercayaan, menjamin kepatuhan peraturan, dan mendukung pertumbuhan tempat kerja yang berkelanjutan. @else Discover our tailored service offerings designed to build trust, guarantee regulatory compliance, and support sustainable workplace growth. @endif
        </p>
    </div>
</section>

<!-- Detailed Services Grid -->
<section class="section-padding" style="background-color: #f8fafc; position: relative; overflow: hidden;">
    <!-- Background Image with 20% Opacity -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop'); background-size: cover; background-position: center; opacity: 0.2; z-index: 0; filter: grayscale(50%); mix-blend-mode: multiply;"></div>

    <div class="container services-section-grid" style="position: relative; z-index: 1;">
        
        <!-- 1. Research -->
        <div class="service-detail-card" id="service-research-card">
            <div class="service-card-decor"></div>
            <div class="service-icon-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
            </div>
            <h2 class="service-detail-title">@if(app()->getLocale() === 'id') Riset @else Research @endif</h2>
            <p class="service-detail-desc">
                @if(app()->getLocale() === 'id') Kami menghasilkan riset terapan yang membantu organisasi memahami tantangan ketenagakerjaan dan tempat kerja melalui studi baseline, diagnosis ketenagakerjaan dan K3, asesmen risiko, kajian kebijakan, serta kajian strategis untuk mendukung pengambilan keputusan berbasis bukti. @else We produce applied research that helps organisations understand emerging labour and workplace challenges through baseline studies, labour and OHS diagnostics, risk assessments, policy analysis, and strategic insights that support evidence-based decision-making. @endif
            </p>
            <a href="{{ route('resources') }}" class="service-detail-btn">
                <span>@if(app()->getLocale() === 'id') Lihat Pusat Publikasi @else View Publications Hub @endif</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
        
        <!-- 2. Strategic Advisory -->
        <div class="service-detail-card" id="service-advisory-card">
            <div class="service-card-decor"></div>
            <div class="service-icon-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1.3.5 2.6 1.5 3.5.8.8 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>
            </div>
            <h2 class="service-detail-title">@if(app()->getLocale() === 'id') Konsultasi Strategis @else Strategic Advisory @endif</h2>
            <p class="service-detail-desc">
                @if(app()->getLocale() === 'id') Kami memberikan konsultasi strategis untuk membantu organisasi memperkuat Responsible Business Conduct (RBC), Human Rights Due Diligence (HRDD), praktik ketenagakerjaan yang bertanggung jawab, keselamatan dan kesehatan kerja (K3), serta rantai pasok yang bertanggung jawab sesuai perkembangan regulasi dan ekspektasi para pemangku kepentingan. @else We provide strategic advice to help organisations strengthen Responsible Business Conduct (RBC), Human Rights Due Diligence (HRDD), responsible employment, occupational health and safety, and responsible supply chain practices while meeting evolving regulatory and stakeholder expectations. @endif
            </p>
            <a href="{{ route('contact') }}" class="service-detail-btn">
                <span>@if(app()->getLocale() === 'id') Minta Konsultasi Advisory @else Request Advisory Consultation @endif</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        <!-- 3. Independent Assessment -->
        <div class="service-detail-card" id="service-assessment-card">
            <div class="service-card-decor"></div>
            <div class="service-icon-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
            <h2 class="service-detail-title">@if(app()->getLocale() === 'id') Asesmen Independen @else Independent Assessment @endif</h2>
            <p class="service-detail-desc">
                @if(app()->getLocale() === 'id') Kami melaksanakan asesmen independen untuk mengidentifikasi risiko ketenagakerjaan, hak asasi manusia, dan keselamatan kerja melalui Human Rights Due Diligence, asesmen ketenagakerjaan dan K3, penilaian rantai pasok, serta diagnosis organisasi guna mendorong perbaikan yang berkelanjutan. @else We conduct independent assessments to identify labour, human rights, and workplace safety risks through Human Rights Due Diligence, labour and OHS assessments, supply chain reviews, and organisational diagnostics that support continuous improvement. @endif
            </p>
            <a href="{{ route('contact') }}" class="service-detail-btn">
                <span>@if(app()->getLocale() === 'id') Hubungi Kami @else Contact Us @endif</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
        
        <!-- 4. Training & Capacity Building -->
        <div class="service-detail-card" id="service-training-card">
            <div class="service-card-decor"></div>
            <div class="service-icon-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12.2V16a6 3 0 0 0 12 0v-3.8"/></svg>
            </div>
            <h2 class="service-detail-title">@if(app()->getLocale() === 'id') Pelatihan dan Penguatan Kapasitas @else Training and Capacity Building @endif</h2>
            <p class="service-detail-desc">
                @if(app()->getLocale() === 'id') Kami memperkuat kapasitas organisasi melalui pelatihan praktis, workshop yang disesuaikan dengan kebutuhan, fasilitasi teknis, dan forum multipihak yang membantu menerjemahkan pengetahuan menjadi praktik nyata di tempat kerja yang bertanggung jawab. @else We strengthen organisational capability through practical training, customised workshops, technical facilitation, and multi-stakeholder forums that translate knowledge into practical actions for responsible workplaces. @endif
            </p>
            <a href="{{ route('contact') }}" class="service-detail-btn">
                <span>@if(app()->getLocale() === 'id') Hubungi Koordinator Akademi @else Contact Academy Coordinator @endif</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
        
    </div>
</section>

<!-- Sectors Target Banner -->
<section class="section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
    <div class="container" style="text-align: center;">
        <span class="section-subtitle">@if(app()->getLocale() === 'id') Sektor Target @else Target Sectors @endif</span>
        <h2 style="font-size: 28px; margin-top: 12px; margin-bottom: 24px;">@if(app()->getLocale() === 'id') Disesuaikan untuk Industri Berisiko Tinggi dan Potensial Tinggi Indonesia @else Tailored to High-Risk, High-Potential Indonesian Industries @endif</h2>
        <p style="max-width: 700px; margin: 0 auto 36px auto; color: var(--text-muted);">
            @if(app()->getLocale() === 'id') Kami hadir sebagai mitra strategis yang berspesialisasi dalam mendukung industri berat esensial. Layanan kami mencakup sektor Pertambangan Nikel, Smelter, Perkebunan Kelapa Sawit, Manufaktur Berat, Infrastruktur dan Konstruksi, Energi, serta Logistik. @else We serve as a strategic partner specializing in supporting essential heavy industries. Our services cover the nickel mining, smelting, oil palm plantation, heavy manufacturing, infrastructure and construction, energy, and logistics sectors. @endif
        </p>
        <a href="{{ route('sectors') }}" class="btn btn-outline" style="border-color: var(--primary); color: var(--primary);">@if(app()->getLocale() === 'id') Lihat Detail Sektor @else View Sectors Details @endif</a>
    </div>
</section>
@endsection
