@extends('layouts.app')

@section('title', 'ICLO - Indonesian Centre for Labour and Occupational Safety and Health')

@section('content')
<!-- PART 1: Hero Banner (WRI & TBI Style) -->
<section class="hero-premium hero-home">
    <div class="hero-slideshow">
        <img src="{{ asset('images/home-banner.jpg') }}" alt="Industrial Workers 1" class="hero-slide" onerror="this.src='https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2070&auto=format&fit=crop'">
        <img src="{{ asset('images/gambar2.jpeg') }}" alt="Construction Workers" class="hero-slide">
        <img src="{{ asset('images/gambar3.jpeg') }}" alt="Industrial Manufacturing" class="hero-slide">
    </div>
    <div class="hero-premium-overlay"></div>
    <div class="hero-premium-content container">
        <h1 class="hero-title-main">
            SAFE WORK.<br>
            STRONGER PEOPLE.<br>
            SUSTAINABLE FUTURE.
        </h1>
        
        <div class="hero-meta" style="margin-bottom: 24px; font-size: 15px; color: rgba(255,255,255,0.9); display: flex; align-items: center; gap: 8px;">
            <strong style="text-transform: uppercase; letter-spacing: 1px;">ICLO</strong> 
            <span>|</span>
            <span>
            @if(app()->getLocale() === 'id')
                Mewujudkan Tempat Kerja yang Bertanggung Jawab bagi Karyawan, Perusahaan, dan Masyarakat.
            @else
                Advancing Responsible Workplaces for People, Business, and Society.
            @endif
            </span>
        </div>

        <!-- <div style="display: flex; gap: 16px;">
            <a href="{{ route('contact') }}" style="display: inline-flex; align-items: center; background-color: #E63946; color: white; padding: 12px 24px; font-weight: 600; font-size: 16px; text-decoration: none; transition: background-color 0.3s;">
                @if(app()->getLocale() === 'id') Hubungi Kami @else Contact Us @endif <i class="fas fa-chevron-right" style="margin-left: 12px; font-size: 12px;"></i>
            </a>
            <a href="{{ route('services') }}" style="display: inline-flex; align-items: center; background-color: #E63946; color: white; padding: 12px 24px; font-weight: 600; font-size: 16px; text-decoration: none; transition: background-color 0.3s;">
                @if(app()->getLocale() === 'id') Layanan @else Services @endif <i class="fas fa-chevron-right" style="margin-left: 12px; font-size: 12px;"></i>
            </a>
        </div> -->
    </div>
</section>

<!-- PART 2: Two Pillars of ICLO Services (Asymmetrical Layout) -->
<section class="pillars-premium section-padding-lg">
    <div class="container">
        
        <!-- Pillar 1: Research Hub -->
        <div class="pillar-row pillar-row-right fade-in-on-scroll">
            <div class="pillar-image-col">
                <img src="{{asset('images/Riset.jpg')}}" alt="Research Hub" class="premium-img-rounded">
            </div>
            <div class="pillar-content-col">
                <span class="premium-label">01 // @if(app()->getLocale() === 'id') PUSAT RISET @else RESEARCH HUB @endif</span>
                <h2 class="premium-heading">@if(app()->getLocale() === 'id') Kebijakan dan Studi Berbasis Bukti @else Evidence-Based Policy and Studies @endif</h2>
                <p class="premium-paragraph">
                    @if(app()->getLocale() === 'id')
                        Kami menghasilkan riset terapan yang membantu organisasi memahami tantangan ketenagakerjaan, mengidentifikasi risiko tenaga kerja dan tempat kerja, menganalisis tren yang berkembang, serta mendukung pengambilan keputusan berbasis bukti. Riset kami mendukung praktik ketenagakerjaan yang bertanggung jawab, keselamatan dan kesehatan kerja, bisnis yang bertanggung jawab, serta rantai pasok yang berkelanjutan.
                    @else
                        We deliver applied research that helps organisations understand workforce challenges, identify labour and workplace risks, assess emerging trends, and make informed decisions. Our research supports responsible employment, occupational health and safety, responsible business practices, and sustainable supply chains through practical, evidence-based insights.
                    @endif
                </p>
                <ul class="premium-list">
                    @if(app()->getLocale() === 'id')
                        <li>Studi baseline dan diagnosis</li>
                        <li>Kajian risiko ketenagakerjaan dan tempat kerja</li>
                        <li>Studi Keselamatan dan Kesehatan Kerja (K3)</li>
                        <li>Kajian rantai pasok yang bertanggung jawab</li>
                        <li>Analisis tenaga kerja dan masa depan dunia kerja</li>
                        <li>Kajian kebijakan dan regulasi</li>
                        <li>Intelijen sektor dan industri</li>
                        <li>Outlook, indeks, dan produk pengetahuan</li>
                    @else
                        <li>Baseline and diagnostic studies</li>
                        <li>Labour and workplace risk assessments</li>
                        <li>Occupational Health and Safety studies</li>
                        <li>Responsible supply chain research</li>
                        <li>Workforce and future of work analysis</li>
                        <li>Policy and regulatory studies</li>
                        <li>Sector and industry intelligence</li>
                        <li>Outlook reports, indices, and knowledge products</li>
                    @endif
                </ul>
                <a href="{{ route('services') }}" class="btn-premium-outline mt-4">@if(app()->getLocale() === 'id') Pelajari Riset Kami @else Explore Our Research @endif →</a>
            </div>
        </div>

        <!-- Pillar 2: Advisory & Audit -->
        <div class="pillar-row pillar-row-left fade-in-on-scroll" style="margin-top: 80px;">
            <div class="pillar-content-col">
                <span class="premium-label">02 // @if(app()->getLocale() === 'id') Konsultasi Strategis @else Strategic Advisory @endif</span>
                <h2 class="premium-heading">@if(app()->getLocale() === 'id') Diagnostik dan Sertifikasi Tempat Kerja @else Workplace Diagnostics and Certification @endif</h2>
                <p class="premium-paragraph">
                    @if(app()->getLocale() === 'id')
                        Kami membantu organisasi membangun tempat kerja yang bertanggung jawab melalui penguatan praktik ketenagakerjaan, hak asasi manusia, dan keselamatan serta kesehatan kerja, sekaligus menyelaraskan operasional bisnis dengan perkembangan regulasi, ekspektasi para pemangku kepentingan, serta standar nasional dan internasional yang diakui.
                    @else
                        We help organisations build responsible workplaces by strengthening labour, human rights, and workplace safety practices while aligning business operations with evolving regulatory requirements, stakeholder expectations, and recognised national and international standards.
                    @endif
                </p>
                <ul class="premium-list">
                    @if(app()->getLocale() === 'id')
                        <li>Responsible Business Conduct (RBC)</li>
                        <li>Human Rights Due Diligence (HRDD)</li>
                        <li>Responsible Employment</li>
                        <li>Keselamatan dan Kesehatan Kerja (K3)</li>
                        <li>Rantai Pasok yang Bertanggung Jawab</li>
                        <li>Kinerja Sosial ESG</li>
                        <li>Manajemen Risiko Ketenagakerjaan dan K3</li>
                        <li>Pengembangan Kebijakan dan Strategi</li>
                    @else
                        <li>Responsible Business Conduct (RBC)</li>
                        <li>Human Rights Due Diligence (HRDD)</li>
                        <li>Responsible Employment</li>
                        <li>Occupational Health & Safety (OHS)</li>
                        <li>Responsible Supply Chains</li>
                        <li>ESG Social Performance</li>
                        <li>Labour & OHS Risk Managemen</li>
                        <li>Policy and Strategy Development</li>
                    @endif
                </ul>
                <a href="{{ route('services') }}" class="btn-premium-solid mt-4">@if(app()->getLocale() === 'id') Layanan Konsultasi @else Request Assessment @endif →</a>
            </div>
            <div class="pillar-image-col">
                <!-- Placeholder for: tangan memegang formulir pajak dengan kalkulator dan laptop -->
                <img src="{{asset('images/konsultasi2.jpeg')}}" alt="Advisory & Audit" class="premium-img-rounded">
            </div>
        </div>

    </div>
</section>

<!-- PART 3: Executive & Expert Directory (CELIOS Style) -->
<section class="experts-directory section-padding-lg" style="background-color: var(--bg-warm);">
    <div class="container">
        <div class="section-header-clean fade-in-on-scroll" style="text-align: center;">
            <h2 class="premium-heading">@if(app()->getLocale() === 'id') Tim @else Team @endif</h2>
        </div>

        <!-- Leadership Group -->
        <div class="experts-grid-3 fade-in-on-scroll mt-2" style="justify-content: center;">
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
        <div class="swipe-slider fade-in-on-scroll mt-2">
            
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

<!-- PART 4: Latest Articles -->
<section class="publications-repository section-padding-lg">
    <div class="container">
        <div class="publications-header fade-in-on-scroll">
            <h2 class="premium-heading">@if(app()->getLocale() === 'id') Artikel Terbaru @else Latest Articles @endif</h2>
            <a href="{{ route('articles.index') }}" class="link-premium">@if(app()->getLocale() === 'id') Lihat Semua Artikel @else View All Articles @endif &rarr;</a>
        </div>
        
        <div class="publications-grid fade-in-on-scroll mt-5">
            @foreach($articles as $article)
            <a href="{{ route('articles.show', $article->slug) }}" class="publication-card">
                <div class="pub-image">
                    <img src="{{  $article->cover_image ? : 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?q=80&w=2069&auto=format&fit=crop' }}" alt="{{ $article->title }}">
                </div>
                <div class="pub-content">
                    <span class="pub-category">{{ $article->category ? $article->category->name : (@app()->getLocale() === 'id' ? 'Tak Berkategori' : 'Uncategorized') }}</span>
                    <h3 class="pub-title">{{ $article->title }}</h3>
                    <p class="pub-date">{{ $article->formatted_date }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action Banner (Clean/Premium WRI style) -->
<section class="cta-premium">
    <div class="container" style="max-width: 800px; margin: 0 auto; text-align: center;">
        <h2 class="premium-heading text-white">@if(app()->getLocale() === 'id') Bermitra dengan ICLO untuk memperkuat tenaga kerja dan sistem tempat kerja Anda. @else Partner with ICLO to strengthen your workforce and workplace systems. @endif</h2>
        <div class="mt-5" style="display: flex; gap: 20px; justify-content: center;">
            <a href="{{ route('contact') }}" class="btn-premium-solid-white">@if(app()->getLocale() === 'id') Hubungi Tim Kami @else Contact Our Team @endif</a>
            <a href="{{ route('services') }}" class="btn-premium-outline-white">@if(app()->getLocale() === 'id') Jelajahi Layanan @else Explore Services @endif</a>
        </div>
    </div>
</section>

@endsection
