@extends('layouts.app')

@section('title', 'Tentang Kami - ICLO')

@section('content')
<!-- Header Banner -->
<section class="hero-premium" style="min-height: 400px; height: 50vh;">
    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop" alt="ICLO Team" class="hero-premium-bg">
    <div class="hero-premium-overlay"></div>
    <div class="hero-premium-content container" style="padding-top: 0;">
        <span class="premium-label" style="color: var(--accent); margin-bottom: 20px;">{{ __('about_subtitle') }}</span>
        <h1 class="hero-title-main" style="margin-bottom: 16px;">{{ __('about_title') }}</h1>
        <p class="hero-subtitle-main" style="max-width: 700px; margin: 0 auto;">
            {{ __('footer_description') }}
        </p>
    </div>
</section>

<!-- Vision & Mission -->
<section class="section-padding" style="background-color: white;">
    <div class="container about-grid">
        <div>
            <h2 style="font-size: 32px; margin-top: 16px; margin-bottom: 24px; color: var(--primary-dark);">@if(app()->getLocale() === 'id') TENTANG ICLO @else ABOUT ICLO @endif</h2>
            
            @if(app()->getLocale() === 'id')
            <p style="color: var(--text-muted); margin-bottom: 20px;">
                Indonesian Centre for Labour and Occupational Health and Safety (ICLO) merupakan Centre of Excellence Indonesia untuk Responsible Employment dan Workplace Safety. Kami membantu organisasi membangun tempat kerja yang bertanggung jawab melalui penguatan praktik ketenagakerjaan yang bertanggung jawab, keselamatan dan kesehatan kerja (K3), serta praktik bisnis yang bertanggung jawab melalui riset berbasis bukti, konsultasi strategis, asesmen independen, dan penguatan kapasitas.
            </p>
            @else
            <p style="color: var(--text-muted); margin-bottom: 20px;">
                The Indonesian Centre for Labour and Occupational Health and Safety (ICLO) is Indonesia's Centre of Excellence for Responsible Employment and Workplace Safety. We help organisations build responsible workplaces by strengthening responsible employment, occupational health and safety, and responsible business practices through evidence-based research, strategic advisory, independent assessment, and capacity building.
            </p>
            @endif
        </div>
        
        <div class="about-vision-mission">
            <!-- Vision -->
            <div class="v-m-block" id="vision-block">
                <h3>⭐ @if(app()->getLocale() === 'id') VISI @else VISION @endif</h3>
                <p style="font-size: 15px; font-style: italic; color: var(--primary-dark); font-weight: 500;">
                    "@if(app()->getLocale() === 'id') Menjadi Centre of Excellence terpercaya di Indonesia dalam praktik ketenagakerjaan yang bertanggung jawab dan keselamatan di tempat kerja. @else To be Indonesia's trusted Centre of Excellence for responsible employment and workplace safety. @endif"
                </p>
            </div>
            
            <!-- Mission -->
            <div class="v-m-block" id="mission-block" style="border-left-color: var(--accent);">
                <h3>🎯 @if(app()->getLocale() === 'id') MISI @else MISSION @endif</h3>
                <ul class="v-m-list">
                    @if(app()->getLocale() === 'id')
                        <li>Memajukan praktik ketenagakerjaan yang bertanggung jawab dan keselamatan di tempat kerja melalui solusi yang praktis dan berbasis bukti.</li>
                        <li>Memperkuat kapasitas organisasi melalui riset, konsultasi strategis, asesmen independen, dan penguatan kapasitas.</li>
                        <li>Mendukung pemerintah, dunia usaha, dan mitra pembangunan dalam mewujudkan tempat kerja yang bertanggung jawab, aman, dan berkelanjutan.</li>
                    @else
                        <li>Advance responsible employment and workplace safety through practical, evidence-based solutions.</li>
                        <li>Strengthen organisational capability through research, strategic advisory, independent assessment, and capacity building.</li>
                        <li>Support governments, businesses, and development partners in creating responsible, safe, and sustainable workplaces</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Leadership & Experts Showcase -->
<section class="section-padding" style="background-color: var(--bg-light);">
    <div class="container">
        <div class="section-title-wrapper">
            <span class="section-subtitle">{{ __('about_leadership_title') }}</span>
            <h2 class="section-title">{{ __('about_leadership_subtitle') }}</h2>
            <p class="section-desc">@if(app()->getLocale() === 'id') Kekuatan kami terletak pada pakar multidisiplin kami yang memiliki pengalaman gabungan dalam kebijakan, akademik, dan praktik tata kelola dan K3. @else Our strength lies in our multidisciplinary experts possessing combined policy, academic, and practical governance and OSH experience. @endif</p>
        </div>
        
        <!-- Leadership Group -->
        <h3 style="font-size: 20px; border-bottom: 2px solid var(--accent); display: inline-block; padding-bottom: 6px; margin-bottom: 30px;">@if(app()->getLocale() === 'id') Pimpinan @else Leadership @endif</h3>
        <div class="experts-grid-3 fade-in-on-scroll mt-2">
            <!-- Leader 1 -->
            <a href="{{ route('experts.unang-mulkhan') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/unang.webp')}}" alt="Dr. Unang Mulkhan" class="expert-photo elegant-filter" style="object-position: center 20%;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Direktur Eksekutif @else Executive Director @endif</div>
                        <h3 class="expert-name">Dr. Unang Mulkhan</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Memberikan kepemimpinan strategis dalam memajukan ICLO sebagai platform terpercaya. @else Providing strategic leadership in advancing ICLO as a credible and trusted platform. @endif</p>
                    </div>
                </div>
            </a>
            
            <!-- Leader 2 -->
            <a href="{{ route('experts.abdul-darda') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/abduldarda.png') }}" alt="Mr. Abdul Darda" class="expert-photo elegant-filter">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Direktur Operasional @else Director of Operations @endif</div>
                        <h3 class="expert-name">Abdul Darda, SH., MH</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Mengawasi kepemimpinan operasional dan implementasi strategis di seluruh ICLO. @else Overseeing the institution’s operational leadership and strategic implementation. @endif</p>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Experts & Managers Group -->
        <h3 style="font-size: 20px; border-bottom: 2px solid var(--accent); display: inline-block; padding-bottom: 6px; margin-bottom: 30px; margin-top: 30px;">@if(app()->getLocale() === 'id') Pakar & Manajer @else Experts & Managers @endif</h3>
        <div class="experts-grid-3 fade-in-on-scroll mt-2">
            <!-- Expert 4.5 -->
            <a href="{{ route('experts.tauvik-muhammad') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/tauvik.png') }}" alt="Bapak Tauvik Muhamad" class="expert-photo elegant-filter" style="object-fit: center" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1974&auto=format&fit=crop'">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Penasihat Senior @else Senior Adviser @endif</div>
                        <h3 class="expert-name">Tauvik Muhamad</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Pakar tata kelola ketenagakerjaan dan K3 dengan pengalaman kepemimpinan yang luas di ILO. @else Expert on labour governance and OSH with extensive leadership experience at the ILO. @endif</p>
                    </div>
                </div>
            </a>
            
            <!-- Expert 4 -->
            <a href="{{ route('experts.syarif-hidayat') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/syarif.jpg') }}" alt="Dr. Syarif Hidayat" class="expert-photo elegant-filter" style="object-position: top center;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Konsultan Utama Keselamatan Kimia dan Lingkungan @else Principal Consultant @endif</div>
                        <h3 class="expert-name">Dr. Syarif Hidayat</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Memberikan keahlian strategis dan teknis tentang keselamatan bahan kimia dan lingkungan. @else Providing strategic and technical expertise on chemical and environmental safety. @endif</p>
                    </div>
                </div>
            </a>
            
            <!-- Expert 7 -->
            <a href="{{ route('experts.ikomatussunniah') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/ikomatussunniah.jpg') }}" alt="dr. Ikomatussunniah, M.KKK" class="expert-photo elegant-filter" style="object-position: center 35%;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Konsultan Utama Tata Kelola @else Principal Consultant @endif</div>
                        <h3 class="expert-name">Dr. Ikomatussunniah</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Keahlian ekstensif dalam tata kelola ketenagakerjaan, kebijakan publik, dan regulasi. @else Extensive expertise in labour governance, public policy, and workforce regulation. @endif</p>
                    </div>
                </div>
            </a>
            
            <!-- Expert 8 -->
            <a href="{{ route('experts.era-catur-prasetya') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/catur.jpg') }}" alt="dr. Era Catur Prasetya, Sp.KJ" class="expert-photo elegant-filter">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Konsultan Utama Kesehatan Mental @else Principal Consultant @endif</div>
                        <h3 class="expert-name">dr. Era Catur Prasetya, Sp.KJ</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Keahlian dalam psikiatri, kesehatan mental kerja, dan manajemen risiko psikososial. @else Expertise in psychiatry, occupational mental health, and psychosocial risk management. @endif</p>
                    </div>
                </div>
            </a>
            
            <!-- Expert 11 -->
            <a href="{{ route('experts.bayu-arie-fianto') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/bayu.jpeg') }}" alt="Bayu Arie Fianto, PhD" class="expert-photo elegant-filter" style="object-position: center 15%;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Kepala Asesmen Dampak @else Head of Impact Assessment @endif</div>
                        <h3 class="expert-name">Bayu Arie Fianto, PhD</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Pakar pengukuran dampak sosial, kerangka SROI, dan keuangan berkelanjutan. @else Expert in social impact measurement, SROI framework, and sustainable finance. @endif</p>
                    </div>
                </div>
            </a>
            
            <!-- Expert 3 -->
            <a href="{{ route('experts.dimas-bayu-arya-putra') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/dimas_new.jpg') }}" alt="Mr. Dimas Bayu Arya Putra" class="expert-photo elegant-filter" style="object-position: top center; transform: scale(1.5); transform-origin: top center;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Manajer Riset @else Research Manager @endif</div>
                        <h3 class="expert-name">Dimas Bayu Arya Putra</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Memimpin fungsi riset dan pengembangan pengetahuan di ICLO. @else Leading the institution’s research and knowledge development functions. @endif</p>
                    </div>
                </div>
            </a>
            
            <!-- Expert 9 -->
            <a href="{{ route('experts.nadira-aulia-rulyani') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/nadira.jpg') }}" alt="Ms. Nadira Aulia Rulyani" class="expert-photo elegant-filter" style="object-position: top center;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Manajer Program OSH Digital @else Program Manager @endif</div>
                        <h3 class="expert-name">Nadira Aulia Rulyani</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Memimpin inisiatif transformasi digital dan integrasi teknologi pintar. @else Leading initiatives on digital transformation and smart technology integration. @endif</p>
                    </div>
                </div>
            </a>

            <!-- Expert 10 -->
            <a href="{{ route('experts.agung-satrio-wicaksono') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/agung.jpg') }}" alt="Mr. Agung Satrio Wicaksono" class="expert-photo elegant-filter">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Kepala Statistik & Analitik Data @else Head of Statistics @endif</div>
                        <h3 class="expert-name">Agung Satrio Wicaksono</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Memimpin fungsi penelitian kuantitatif, analisis statistik, dan manajemen data. @else Leading quantitative research, statistical analysis, and data management functions. @endif</p>
                    </div>
                </div>
            </a>

            <!-- Expert 5 -->
            <a href="{{ route('experts.ambi-pradiptha') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/ambi.jpg') }}" alt="Mr. Ambi Pradiptha" class="expert-photo elegant-filter" style="object-position: top center;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Konsultan Utama K3 @else Principal Consultant @endif</div>
                        <h3 class="expert-name">Ambi Pradiptha, S.K.M., M.KKK</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Pengalaman ekstensif dalam manajemen keselamatan kerja dan tata kelola risiko. @else Extensive experience in workplace safety management and preventive risk governance. @endif</p>
                    </div>
                </div>
            </a>

            <!-- Expert 6 -->
            <a href="{{ route('experts.floren-wahyu-purwanto') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/floren.jpg') }}" alt="Mr. Floren Wahyu Purwanto" class="expert-photo elegant-filter" style="object-position: top center;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Konsultan Senior Sistem K3 @else Senior Consultant @endif</div>
                        <h3 class="expert-name">Floren Wahyu Purwanto, SKM</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Keahlian dalam sistem manajemen K3, audit kepatuhan, dan tata kelola risiko. @else Expertise in OSH management systems, compliance auditing, and risk governance. @endif</p>
                    </div>
                </div>
            </a>
            
            <!-- Expert 9: Nayla Adila Taqiyya -->
            <a href="{{ route('experts.nayla-adila-taqiyya') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <!-- Please ensure the image is uploaded as nayla.jpg to public/images/ -->
                        <img src="{{ asset('images/nayla_nobg.png') }}" alt="Nayla Adila Taqiyya" class="expert-photo elegant-filter" style="object-position: top center;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Asisten Riset @else Research Assistant @endif</div>
                        <h3 class="expert-name">Nayla Adila Taqiyya</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Profesional biologi yang berdedikasi pada kesehatan kerja, ESG, dan perlindungan pekerja. @else Biology professional dedicated to occupational health, ESG, and worker protection. @endif</p>
                    </div>
                </div>
            </a>
            
            <!-- Expert: Muhammad Nur Ar Royyan -->
            <a href="{{ route('experts.muhammad-nur-ar-royyan') }}" style="text-decoration: none; color: inherit; display: block;">
                <div class="expert-card">
                    <div class="expert-photo-wrapper">
                        <img src="{{ asset('images/royyan.jpg') }}" alt="Muhammad Nur Ar Royyan" class="expert-photo elegant-filter" style="object-position: center 70%; transform: scale(1.4); transform-origin: center 70%;">
                    </div>
                    <div class="expert-info">
                        <div class="expert-role" style="font-weight: 600; font-size: 13px; color: var(--accent); margin-bottom: 4px;">@if(app()->getLocale() === 'id') Research Fellow @else Research Fellow @endif</div>
                        <h3 class="expert-name">Muhammad Nur Ar Royyan</h3>
                        <p class="expert-bio" style="font-size: 14px; color: var(--text-muted); line-height: 1.5; margin-top: 8px;">@if(app()->getLocale() === 'id') Pakar dalam riset sosial-ekonomi, kebijakan Just Transition, dan kerangka keberlanjutan. @else Expert in socio-economic research, Just Transition policies, and sustainability frameworks. @endif</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection
