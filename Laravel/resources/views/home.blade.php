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

<!-- PART 1.5: Event & News -->
@if(isset($activities) && $activities->count() > 0)
<section id="events" class="section-padding" style="background-color: var(--bg-warm);">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 24px; border-bottom: 1px solid var(--border-color); padding-bottom: 16px;">
            <div>
                <h2 class="premium-heading" style="color: var(--primary-dark); margin-bottom: 0; font-size: 28px;">@if(app()->getLocale() === 'id') Event and News @else Events and News @endif</h2>
            </div>
            <a href="{{ route('activities.index') }}" style="color: var(--primary-dark); text-decoration: none; font-weight: 500; border: 1px solid var(--primary-dark); padding: 8px 16px; border-radius: 4px; display: inline-flex; align-items: center; gap: 8px; font-size: 14px; transition: all 0.3s;">
                @if(app()->getLocale() === 'id') Lihat Banyak @else See More @endif <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="swipe-slider fade-in-on-scroll" style="padding-top: 10px;">
            @foreach($activities as $activity)
                <a href="{{ route('activities.show', $activity->slug ?: $activity->id) }}" style="text-decoration: none; color: inherit; display: block;">
                    <div class="expert-card" style="background: white; overflow: hidden; border: 1px solid var(--border-color); display: flex; flex-direction: column; border-radius: 8px; box-shadow: var(--shadow-sm); transition: transform 0.3s, box-shadow 0.3s;">
                        @if($activity->image)
                            <img src="{{ $activity->image }}" alt="{{ $activity->title }}" style="width: 100%; height: 180px; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 180px; background-color: #e2e8f0; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                                <i class="fas fa-image" style="font-size: 40px; opacity: 0.5;"></i>
                            </div>
                        @endif
                        <div style="padding: 24px 20px; display: flex; flex-direction: column; flex-grow: 1; text-align: left;">
                            @if($activity->date)
                                <span style="color: #94a3b8; font-size: 14px; font-weight: 600; margin-bottom: 12px; display: block;">{{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}</span>
                            @endif
                            <h3 style="font-size: 20px; color: #0078d4; margin-bottom: 12px; line-height: 1.3; font-weight: 700;">{{ Str::limit($activity->title, 60) }}</h3>
                            
                            <p style="font-size: 16px; color: #64748b; margin: 0; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ Str::limit(strip_tags($activity->description), 100) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- PART 2: Two Pillars of ICLO Services (Asymmetrical Layout) -->
<section class="pillars-premium section-padding-lg">
    <div class="container">
        
        <!-- Pillar 1: Research Hub -->
        <div class="pillar-row pillar-row-right fade-in-on-scroll">
            <div class="pillar-image-col">
                <div class="pillar-image-wrapper">
                    <img src="{{ asset('images/research-center-new.jpg') }}" alt="Pusat Riset ICLO" class="premium-img-rounded" id="research-main-img">
                    <div class="pillar-floating-badge">
                        <div class="badge-icon">
                            <i class="fas fa-microscope"></i>
                        </div>
                        <div class="badge-text">
                            <span class="badge-title">@if(app()->getLocale() === 'id') Pusat Riset Terapan @else Applied Research Hub @endif</span>
                            <span class="badge-subtitle">@if(app()->getLocale() === 'id') Berbasis Bukti & Data Riil @else Evidence & Data-Driven @endif</span>
                        </div>
                    </div>
                </div>
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

                <!-- Interactive Accordion -->
                <div class="pillar-accordion" id="research-accordion">
                    <!-- Item 1 -->
                    <div class="pillar-accordion-item active">
                        <button class="pillar-accordion-header" type="button" aria-expanded="true">
                            <div class="accordion-header-left">
                                <span class="accordion-num">01</span>
                                <h4 class="accordion-title">@if(app()->getLocale() === 'id') Studi Baseline, Diagnosis & Risiko Tenaga Kerja @else Baseline Studies & Workplace Risk Assessments @endif</h4>
                            </div>
                            <span class="accordion-chevron"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="pillar-accordion-body">
                            <div class="pillar-accordion-content">
                                <p class="pillar-accordion-desc">
                                    @if(app()->getLocale() === 'id')
                                        Pemetaan mendalam kondisi ketenagakerjaan, identifikasi kesenjangan kepatuhan norma kerja, evaluasi profil demografi pekerja, serta analisis risiko keselamatan dan operasional di tingkat perusahaan maupun rantai nilai.
                                    @else
                                        Comprehensive mapping of workplace conditions, labour standard compliance gaps, workforce demographic analysis, and operational safety risk assessments across enterprise value chains.
                                    @endif
                                </p>
                                <div class="accordion-tags">
                                    <span class="accordion-tag"><i class="fas fa-check"></i> @if(app()->getLocale() === 'id') Studi Baseline @else Baseline Studies @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-check"></i> @if(app()->getLocale() === 'id') Kajian Risiko Kerja @else Workplace Risk @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-check"></i> @if(app()->getLocale() === 'id') Diagnosis Kepatuhan @else Compliance Diagnostics @endif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="pillar-accordion-item">
                        <button class="pillar-accordion-header" type="button" aria-expanded="false">
                            <div class="accordion-header-left">
                                <span class="accordion-num">02</span>
                                <h4 class="accordion-title">@if(app()->getLocale() === 'id') Keselamatan & Kesehatan Kerja (K3) serta Regulasi @else Occupational Health & Safety (OSH) & Regulatory Studies @endif</h4>
                            </div>
                            <span class="accordion-chevron"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="pillar-accordion-body">
                            <div class="pillar-accordion-content">
                                <p class="pillar-accordion-desc">
                                    @if(app()->getLocale() === 'id')
                                        Riset spesifik tentang efektivitas SMK3 (PP 50/2012), ISO 45001, mitigasi bahaya ergonomi & kimia, penanganan risiko psikososial, serta telaah harmonisasi regulasi nasional dengan standar konvensi ILO.
                                    @else
                                        Targeted research on SMK3 (PP 50/2012) efficacy, ISO 45001 implementation, ergonomic & chemical hazard mitigation, psychosocial risks, and alignment with international ILO conventions.
                                    @endif
                                </p>
                                <div class="accordion-tags">
                                    <span class="accordion-tag"><i class="fas fa-shield-alt"></i> @if(app()->getLocale() === 'id') Audit SMK3 @else SMK3 Audit @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-heartbeat"></i> @if(app()->getLocale() === 'id') Risiko Psikososial @else Psychosocial Risk @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-balance-scale"></i> @if(app()->getLocale() === 'id') Kepatuhan Regulasi @else Regulatory Compliance @endif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="pillar-accordion-item">
                        <button class="pillar-accordion-header" type="button" aria-expanded="false">
                            <div class="accordion-header-left">
                                <span class="accordion-num">03</span>
                                <h4 class="accordion-title">@if(app()->getLocale() === 'id') Rantai Pasok Bertanggung Jawab & Uji Tuntas HAM @else Responsible Supply Chains & Human Rights Due Diligence @endif</h4>
                            </div>
                            <span class="accordion-chevron"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="pillar-accordion-body">
                            <div class="pillar-accordion-content">
                                <p class="pillar-accordion-desc">
                                    @if(app()->getLocale() === 'id')
                                        Investigasi dan pemantauan rantai pasok terhadap risiko kerja paksa, pekerja anak, diskriminasi gender, serta pendampingan uji tuntas hak asasi manusia (HRDD) dan integrasi pilar sosial ESG bagi pemasok lokal.
                                    @else
                                        Supply chain risk tracing for forced labour, child labour, gender discrimination, and end-to-end guidance on Human Rights Due Diligence (HRDD) and ESG social governance for suppliers.
                                    @endif
                                </p>
                                <div class="accordion-tags">
                                    <span class="accordion-tag"><i class="fas fa-link"></i> @if(app()->getLocale() === 'id') Rantai Pasok @else Supply Chains @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-hand-holding-heart"></i> @if(app()->getLocale() === 'id') Uji Tuntas HAM (HRDD) @else HRDD @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-leaf"></i> @if(app()->getLocale() === 'id') Kinerja Sosial ESG @else ESG Social @endif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="pillar-accordion-item">
                        <button class="pillar-accordion-header" type="button" aria-expanded="false">
                            <div class="accordion-header-left">
                                <span class="accordion-num">04</span>
                                <h4 class="accordion-title">@if(app()->getLocale() === 'id') Analisis Kebijakan & Masa Depan Dunia Kerja @else Policy Analysis & Future of Work @endif</h4>
                            </div>
                            <span class="accordion-chevron"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="pillar-accordion-body">
                            <div class="pillar-accordion-content">
                                <p class="pillar-accordion-desc">
                                    @if(app()->getLocale() === 'id')
                                        Kajian strategis tentang dampak otomatisasi teknologi, transisi hijau & transisi berkeadilan (Just Transition), dinamika ketenagakerjaan pasca-UU Cipta Kerja, serta perumusan naskah kebijakan berbasis bukti.
                                    @else
                                        Strategic analysis on technological automation impacts, Just Transition dynamics, post-Omnibus Law labour landscapes, and evidence-driven policy formulation for decision-makers.
                                    @endif
                                </p>
                                <div class="accordion-tags">
                                    <span class="accordion-tag"><i class="fas fa-robot"></i> @if(app()->getLocale() === 'id') Masa Depan Kerja @else Future of Work @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-seedling"></i> @if(app()->getLocale() === 'id') Transisi Berkeadilan @else Just Transition @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-file-contract"></i> @if(app()->getLocale() === 'id') Advokasi Kebijakan @else Policy Advocacy @endif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 5 -->
                    <div class="pillar-accordion-item">
                        <button class="pillar-accordion-header" type="button" aria-expanded="false">
                            <div class="accordion-header-left">
                                <span class="accordion-num">05</span>
                                <h4 class="accordion-title">@if(app()->getLocale() === 'id') Intelijen Sektor, Outlook & Produk Pengetahuan @else Sector Intelligence, Industry Outlook & Indices @endif</h4>
                            </div>
                            <span class="accordion-chevron"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="pillar-accordion-body">
                            <div class="pillar-accordion-content">
                                <p class="pillar-accordion-desc">
                                    @if(app()->getLocale() === 'id')
                                        Penyusunan benchmark industri per sektor kunci (pertambangan, energi, garmen, perkebunan kelapa sawit, manufaktur), penerbitan indeks keselamatan tahunan, serta modul pengetahuan praktis.
                                    @else
                                        Sector benchmarks for key industries (mining, energy, garments, palm oil, manufacturing), annual safety index releases, and applied industry whitepapers.
                                    @endif
                                </p>
                                <div class="accordion-tags">
                                    <span class="accordion-tag"><i class="fas fa-chart-line"></i> @if(app()->getLocale() === 'id') Outlook Industri @else Industry Outlook @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-industry"></i> @if(app()->getLocale() === 'id') Benchmark Sektoral @else Sector Benchmark @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-book-open"></i> @if(app()->getLocale() === 'id') Produk Pengetahuan @else Knowledge Products @endif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('services') }}" class="btn-premium-outline mt-2">@if(app()->getLocale() === 'id') Pelajari Riset Kami @else Explore Our Research @endif →</a>
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

                <!-- Interactive Accordion -->
                <div class="pillar-accordion" id="advisory-accordion">
                    <!-- Item 1 -->
                    <div class="pillar-accordion-item active">
                        <button class="pillar-accordion-header" type="button" aria-expanded="true">
                            <div class="accordion-header-left">
                                <span class="accordion-num">01</span>
                                <h4 class="accordion-title">@if(app()->getLocale() === 'id') Responsible Business Conduct (RBC) & HRDD @else Responsible Business Conduct (RBC) & HRDD @endif</h4>
                            </div>
                            <span class="accordion-chevron"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="pillar-accordion-body">
                            <div class="pillar-accordion-content">
                                <p class="pillar-accordion-desc">
                                    @if(app()->getLocale() === 'id')
                                        Pendampingan penerapan prinsip bisnis bertanggung jawab sesuai OECD Guidelines dan UN Guiding Principles, termasuk asesmen uji tuntas hak asasi manusia (HRDD), analisis risiko dampak sosial, serta pengembangan kebijakan dan mekanisme pemulihan.
                                    @else
                                        Implementation guidance for responsible business principles aligned with OECD Guidelines and UN Guiding Principles, including HRDD assessments, social impact risk analysis, and remediation mechanism development.
                                    @endif
                                </p>
                                <div class="accordion-tags">
                                    <span class="accordion-tag"><i class="fas fa-handshake"></i> RBC</span>
                                    <span class="accordion-tag"><i class="fas fa-hand-holding-heart"></i> HRDD</span>
                                    <span class="accordion-tag"><i class="fas fa-gavel"></i> @if(app()->getLocale() === 'id') Kepatuhan Internasional @else Intl. Compliance @endif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="pillar-accordion-item">
                        <button class="pillar-accordion-header" type="button" aria-expanded="false">
                            <div class="accordion-header-left">
                                <span class="accordion-num">02</span>
                                <h4 class="accordion-title">@if(app()->getLocale() === 'id') Keselamatan & Kesehatan Kerja (K3) dan Sertifikasi @else Occupational Health & Safety (OHS) and Certification @endif</h4>
                            </div>
                            <span class="accordion-chevron"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="pillar-accordion-body">
                            <div class="pillar-accordion-content">
                                <p class="pillar-accordion-desc">
                                    @if(app()->getLocale() === 'id')
                                        Audit sistem manajemen K3 (SMK3 PP 50/2012), pendampingan sertifikasi ISO 45001, penilaian risiko tempat kerja, inspeksi keselamatan, serta pengembangan program K3 yang komprehensif dan berkelanjutan.
                                    @else
                                        SMK3 management system audits (PP 50/2012), ISO 45001 certification support, workplace risk assessments, safety inspections, and comprehensive OHS programme development.
                                    @endif
                                </p>
                                <div class="accordion-tags">
                                    <span class="accordion-tag"><i class="fas fa-shield-alt"></i> SMK3</span>
                                    <span class="accordion-tag"><i class="fas fa-certificate"></i> ISO 45001</span>
                                    <span class="accordion-tag"><i class="fas fa-hard-hat"></i> @if(app()->getLocale() === 'id') Audit K3 @else OHS Audit @endif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="pillar-accordion-item">
                        <button class="pillar-accordion-header" type="button" aria-expanded="false">
                            <div class="accordion-header-left">
                                <span class="accordion-num">03</span>
                                <h4 class="accordion-title">@if(app()->getLocale() === 'id') Rantai Pasok Bertanggung Jawab & Kinerja Sosial ESG @else Responsible Supply Chains & ESG Social Performance @endif</h4>
                            </div>
                            <span class="accordion-chevron"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="pillar-accordion-body">
                            <div class="pillar-accordion-content">
                                <p class="pillar-accordion-desc">
                                    @if(app()->getLocale() === 'id')
                                        Asesmen dan pendampingan pemasok/kontraktor untuk memenuhi standar ketenagakerjaan internasional, pencegahan kerja paksa dan pekerja anak, integrasi pilar sosial ESG, serta peningkatan kapabilitas rantai pasok lokal.
                                    @else
                                        Supplier/contractor assessments and advisory for international labour standards compliance, forced labour and child labour prevention, ESG social pillar integration, and local supply chain capability building.
                                    @endif
                                </p>
                                <div class="accordion-tags">
                                    <span class="accordion-tag"><i class="fas fa-link"></i> @if(app()->getLocale() === 'id') Rantai Pasok @else Supply Chain @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-leaf"></i> ESG</span>
                                    <span class="accordion-tag"><i class="fas fa-users"></i> @if(app()->getLocale() === 'id') Kapabilitas Pemasok @else Supplier Dev. @endif</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="pillar-accordion-item">
                        <button class="pillar-accordion-header" type="button" aria-expanded="false">
                            <div class="accordion-header-left">
                                <span class="accordion-num">04</span>
                                <h4 class="accordion-title">@if(app()->getLocale() === 'id') Manajemen Risiko & Pengembangan Kebijakan Strategis @else Risk Management & Strategic Policy Development @endif</h4>
                            </div>
                            <span class="accordion-chevron"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="pillar-accordion-body">
                            <div class="pillar-accordion-content">
                                <p class="pillar-accordion-desc">
                                    @if(app()->getLocale() === 'id')
                                        Penyusunan kerangka manajemen risiko ketenagakerjaan dan K3, pengembangan kebijakan internal perusahaan, peta jalan (roadmap) kepatuhan regulasi, serta perencanaan strategis untuk penguatan tata kelola organisasi.
                                    @else
                                        Labour and OHS risk management framework development, internal corporate policy formulation, regulatory compliance roadmaps, and strategic planning for organisational governance improvement.
                                    @endif
                                </p>
                                <div class="accordion-tags">
                                    <span class="accordion-tag"><i class="fas fa-exclamation-triangle"></i> @if(app()->getLocale() === 'id') Manajemen Risiko @else Risk Management @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-file-contract"></i> @if(app()->getLocale() === 'id') Kebijakan Internal @else Policy Dev. @endif</span>
                                    <span class="accordion-tag"><i class="fas fa-road"></i> @if(app()->getLocale() === 'id') Peta Jalan Strategis @else Strategic Roadmap @endif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('services') }}" class="btn-premium-solid mt-2">@if(app()->getLocale() === 'id') Layanan Konsultasi @else Request Assessment @endif →</a>
            </div>
            <div class="pillar-image-col">
                <div class="pillar-image-wrapper">
                    <img src="{{ asset('images/konsultasi2.jpeg') }}" alt="Konsultasi & Audit ICLO" class="premium-img-rounded" id="advisory-main-img">
                    <div class="pillar-floating-badge" style="left: 20px; right: auto;">
                        <div class="badge-icon" style="background: linear-gradient(135deg, #2FA084 0%, #217A64 100%);">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="badge-text">
                            <span class="badge-title">@if(app()->getLocale() === 'id') Konsultasi Strategis @else Strategic Advisory @endif</span>
                            <span class="badge-subtitle">@if(app()->getLocale() === 'id') Audit & Sertifikasi @else Audit & Certification @endif</span>
                        </div>
                    </div>
                </div>
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
