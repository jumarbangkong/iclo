@extends('layouts.app')

@section('title', 'Sektor & Industri - ICLO')

@section('content')
<style>
    .sectors-bottom-row {
        grid-column: 1 / -1;
        display: flex;
        justify-content: center;
        gap: 32px;
        flex-wrap: wrap;
    }
    .sectors-bottom-row .sector-card {
        flex: 1 1 300px;
        max-width: calc(33.333% - 16px);
    }
    @media (max-width: 992px) {
        .sectors-bottom-row .sector-card {
            max-width: calc(50% - 16px);
        }
    }
    @media (max-width: 768px) {
        .sectors-bottom-row .sector-card {
            max-width: 100%;
        }
    }
</style>
<!-- Header Banner -->
<section class="hero-premium" style="min-height: 400px; height: 50vh;">
    <img src="{{ asset('images/sectors_hero.png') }}" alt="Industrial Sectors" class="hero-premium-bg">
    <div class="hero-premium-overlay"></div>
    <div class="hero-premium-content container" style="padding-top: 0;">
        <span class="premium-label" style="color: var(--accent); margin-bottom: 20px;">@if(app()->getLocale() === 'id') Jangkauan Nasional @else National Footprint @endif</span>
        <h1 class="hero-title-main" style="margin-bottom: 16px;">{{ __('nav_sectors') }}</h1>
        <p class="hero-subtitle-main" style="max-width: 700px; margin: 0 auto;">
            {{ __('sectors_subtitle') }}
        </p>
    </div>
</section>

<!-- Sectors Grid -->
<section class="section-padding" style="background-color: white;">
    <div class="container">
        <div class="section-title-wrapper">
            <span class="section-subtitle">@if(app()->getLocale() === 'id') Ruang Lingkup Dampak @else Scope of Impact @endif</span>
            <h2 class="section-title">@if(app()->getLocale() === 'id') Mendukung Tempat Kerja yang Bertanggung Jawab di Berbagai Sektor Industri @else SUPPORTING RESPONSIBLE WORKPLACES ACROSS INDUSTRIES @endif</h2>
            <!-- <p class="section-desc">@if(app()->getLocale() === 'id') Mendukung Tempat Kerja yang Bertanggung Jawab di Berbagai Sektor Industri @else Hover over each industry sector to discover the specific regulatory challenges and risk mitigations we consult on. @endif</p> -->
        </div>
        
        <div class="sectors-grid">
            <!-- Sector 1: Mining, Smelters & Critical Minerals -->
            <div class="sector-card" id="sector-mining">
                <div class="sector-card-bg" style="background-image: url('{{ asset('images/sector_mining_real.jpg') }}'); background-size: cover; background-position: center;"></div>
                <div class="sector-card-overlay"></div>
                <div class="sector-content">
                    <div class="sector-icon">⛏️</div>
                    <h3 class="sector-title">@if(app()->getLocale() === 'id') Pertambangan, Smelter dan Mineral Kritis @else Mining, Smelters and Critical Minerals @endif</h3>
                    <p class="sector-desc">@if(app()->getLocale() === 'id') Industri mineral kritis menjadi fondasi transisi energi global sekaligus menghadapi tuntutan yang semakin tinggi terhadap praktik ketenagakerjaan yang bertanggung jawab, pengelolaan kontraktor, keselamatan kerja, dan due diligence rantai pasok. ICLO membantu organisasi memperkuat praktik tempat kerja yang bertanggung jawab sekaligus meningkatkan ketahanan operasional. @else Critical mineral industries are central to the global energy transition but face increasing expectations for responsible employment, contractor management, workplace safety, and supply chain due diligence. ICLO helps organisations strengthen responsible workplace practices while improving operational resilience. @endif</p>
                </div>
            </div>
            
            <!-- Sector 2: Palm Oil & Plantations -->
            <div class="sector-card" id="sector-palmoil">
                <div class="sector-card-bg" style="background-image: url('{{ asset('images/sector_palmoil_real.jpg') }}'); background-size: cover; background-position: center;"></div>
                <div class="sector-card-overlay"></div>
                <div class="sector-content">
                    <div class="sector-icon">🌴</div>
                    <h3 class="sector-title">@if(app()->getLocale() === 'id') Kelapa Sawit dan Pertanian @else Palm Oil and Agriculture @endif</h3>
                    <p class="sector-desc">@if(app()->getLocale() === 'id') Rantai nilai sektor pertanian membutuhkan praktik ketenagakerjaan yang bertanggung jawab, kemitraan yang kuat dengan petani plasma dan swadaya, serta penerapan K3 yang efektif untuk memenuhi tuntutan keberlanjutan. ICLO mendukung organisasi membangun operasi pertanian yang lebih bertanggung jawab dan tangguh. @else Agricultural value chains require responsible employment practices, strong partnerships with smallholders and plasma farmers, and effective workplace safety to meet growing sustainability expectations. ICLO supports organisations in building more responsible and resilient agricultural operations. @endif</p>
                </div>
            </div>
            
            <!-- Sector 3: Manufacturing -->
            <div class="sector-card" id="sector-manufacturing">
                <div class="sector-card-bg" style="background-image: url('{{ asset('images/sector_manufacturing_real.jpg') }}'); background-size: cover; background-position: center;"></div>
                <div class="sector-card-overlay"></div>
                <div class="sector-content">
                    <div class="sector-icon">🏭</div>
                    <h3 class="sector-title">@if(app()->getLocale() === 'id') Manufaktur @else Manufacturing @endif</h3>
                    <p class="sector-desc">@if(app()->getLocale() === 'id') Sektor manufaktur menghadapi tuntutan yang semakin besar untuk memperkuat praktik ketenagakerjaan, keselamatan kerja, produktivitas, dan kinerja ESG. ICLO membantu organisasi membangun operasional yang bertanggung jawab sekaligus memenuhi ekspektasi pelanggan dan regulator. @else Manufacturers face increasing pressure to improve labour practices, workplace safety, productivity, and ESG performance. ICLO helps organisations strengthen responsible operations while meeting customer and regulatory expectations. @endif</p>
                </div>
            </div>

            <!-- Sector 4: Garment & Textiles -->
            <div class="sector-card" id="sector-garment">
                <div class="sector-card-bg" style="background-image: url('{{ asset('images/sector_garment_real.jpg') }}'); background-size: cover; background-position: center;"></div>
                <div class="sector-card-overlay"></div>
                <div class="sector-content">
                    <div class="sector-icon">👕</div>
                    <h3 class="sector-title">@if(app()->getLocale() === 'id') Garmen dan Tekstil @else Garment and Textiles @endif</h3>
                    <p class="sector-desc">@if(app()->getLocale() === 'id') Rantai pasok industri garmen menuntut praktik ketenagakerjaan yang etis, perlindungan pekerja, dan pengadaan yang bertanggung jawab. ICLO mendukung organisasi memperkuat praktik ketenagakerjaan, keselamatan kerja, dan integritas rantai pasok. @else Global apparel supply chains demand ethical employment, worker protection, and responsible sourcing. ICLO supports organisations in strengthening labour practices, workplace safety, and supply chain integrity. @endif</p>
                </div>
            </div>

            <!-- Sector 5: Seafood & Fisheries -->
            <div class="sector-card" id="sector-seafood">
                <div class="sector-card-bg" style="background-image: url('{{ asset('images/sector_seafood_real.jpg') }}'); background-size: cover; background-position: center;"></div>
                <div class="sector-card-overlay"></div>
                <div class="sector-content">
                    <div class="sector-icon">🐟</div>
                    <h3 class="sector-title">@if(app()->getLocale() === 'id') Perikanan dan Industri Hasil Laut @else Seafood and Fisheries @endif</h3>
                    <p class="sector-desc">@if(app()->getLocale() === 'id') Rantai pasok hasil laut menghadapi tuntutan yang semakin tinggi terhadap rekrutmen yang bertanggung jawab, pencegahan kerja paksa, perlindungan pekerja, dan keselamatan kerja. ICLO membantu organisasi membangun operasi perikanan yang lebih bertanggung jawab dan transparan. @else Seafood supply chains are increasingly expected to address responsible recruitment, forced labour risks, worker welfare, and occupational safety. ICLO helps organisations build responsible and transparent seafood operations. @endif</p>
                </div>
            </div>

            <!-- Sector 6: Energy, Oil & Gas -->
            <div class="sector-card" id="sector-energy">
                <div class="sector-card-bg" style="background-image: url('{{ asset('images/sector_energy_real.jpg') }}'); background-size: cover; background-position: center;"></div>
                <div class="sector-card-overlay"></div>
                <div class="sector-content">
                    <div class="sector-icon">⚡</div>
                    <h3 class="sector-title">@if(app()->getLocale() === 'id') Energi, Minyak dan Gas @else Energy, Oil and Gas @endif</h3>
                    <p class="sector-desc">@if(app()->getLocale() === 'id') Operasi berisiko tinggi membutuhkan kepemimpinan K3 yang kuat, tata kelola kontraktor yang baik, dan pengelolaan tenaga kerja yang efektif. ICLO mendukung organisasi meningkatkan keselamatan kerja dan ketahanan operasional. @else High-risk operations require strong safety leadership, responsible contractor management, and effective workforce governance. ICLO supports organisations in improving workplace safety and operational resilience. @endif</p>
                </div>
            </div>

            <!-- Sectors 7 & 8: Centered Bottom Row -->
            <div class="sectors-bottom-row">
                <!-- Sector 7: Infrastructure & Construction -->
                <div class="sector-card" id="sector-infrastructure">
                    <div class="sector-card-bg" style="background-image: url('{{ asset('images/sector_construction_real.jpg') }}'); background-size: cover; background-position: center;"></div>
                    <div class="sector-card-overlay"></div>
                    <div class="sector-content">
                        <div class="sector-icon">🏗️</div>
                        <h3 class="sector-title">@if(app()->getLocale() === 'id') Infrastruktur dan Konstruksi @else Infrastructure and Construction @endif</h3>
                        <p class="sector-desc">@if(app()->getLocale() === 'id') Proyek infrastruktur berskala besar melibatkan rantai pasok yang kompleks, tenaga kerja sementara, dan risiko keselamatan yang tinggi. ICLO membantu organisasi memperkuat K3, manajemen subkontraktor, dan kepatuhan ketenagakerjaan. @else Large-scale infrastructure projects involve complex supply chains, transient workforces, and high safety risks. ICLO helps organisations strengthen OHS, subcontractor management, and labour compliance. @endif</p>
                    </div>
                </div>

                <!-- Sector 8: Public Sector & Development Programmes -->
                 <div class="sector-card" id="sector-public">
                    <div class="sector-card-bg" style="background-image: url('{{ asset('images/sector_public_real.jpg') }}'); background-size: cover; background-position: center;"></div>
                    <div class="sector-card-overlay"></div>
                    <div class="sector-content">
                        <div class="sector-icon">🏛️</div>
                        <h3 class="sector-title">@if(app()->getLocale() === 'id') Sektor Publik dan Program Pembangunan @else Public Sector and Development Programmes @endif</h3>
                        <p class="sector-desc">@if(app()->getLocale() === 'id') Institusi publik dan program pembangunan internasional dituntut untuk menjadi teladan dalam penerapan hak asasi manusia dan standar ketenagakerjaan yang layak. ICLO mendukung penguatan tata kelola, analisis kebijakan, dan integrasi perlindungan sosial. @else Public institutions and international development programmes are expected to lead by example in advancing human rights and decent work standards. ICLO supports governance strengthening, policy analysis, and social protection integration. @endif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sector Advisory Integration CTA -->
<section class="section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color); text-align: center;">
    <div class="container" style="max-width: 700px;">
        <h2 style="font-size: 26px; margin-bottom: 16px;">@if(app()->getLocale() === 'id') Apakah Anda beroperasi di salah satu sektor ini? @else Do you operate in one of these sectors? @endif</h2>
        <p style="color: var(--text-muted); margin-bottom: 30px; font-size: 15px;">
            @if(app()->getLocale() === 'id') Paket audit, diagnostik, dan sertifikasi kami secara eksplisit disusun untuk memenuhi persyaratan peraturan khusus industri Anda. @else Our audits, diagnostics, and certification packages are explicitly structured to meet the particular regulatory requirements of your industry. @endif
        </p>
        <a href="{{ route('contact') }}" class="btn btn-primary">@if(app()->getLocale() === 'id') Hubungi Konsultan Sektor @else Connect with Sector Consultants @endif</a>
    </div>
</section>
@endsection
