@extends('layouts.app')

@section('title', 'Pusat Kemitraan & Kontak - ICLO')

@section('content')
<!-- Header Banner -->
<section class="hero-premium" style="min-height: 400px; height: 50vh;">
    <img src="https://images.unsplash.com/photo-1516387938699-a93567ec168e?q=80&w=2071&auto=format&fit=crop" alt="Contact Us" class="hero-premium-bg">
    <div class="hero-premium-overlay"></div>
    <div class="hero-premium-content container" style="padding-top: 0;">
        <span class="premium-label" style="color: var(--accent); margin-bottom: 20px;">Get in Touch</span>
        <h1 class="hero-title-main" style="margin-bottom: 16px;">{{ __('contact_title') }}</h1>
        <p class="hero-subtitle-main" style="max-width: 700px; margin: 0 auto;">
            {{ __('contact_subtitle') }}
        </p>
    </div>
</section>

<!-- Content Layout Grid -->
<section class="section-padding" style="background-color: white;">
    <div class="container contact-layout-grid">
        <!-- Contact Information Info -->
        <div>
            <p style="color: var(--text-muted); margin-bottom: 30px; font-size: 15px;">
                @if(app()->getLocale() === 'id')
                Indonesian Centre for Labour and Occupational Health and Safety (ICLO) Pusat Keunggulan Indonesia untuk Ketenagakerjaan dan Keselamatan Kerja yang Bertanggung Jawab.
                @else
                Indonesian Centre for Labour and Occupational Health and Safety (ICLO) Indonesia's Centre of Excellence for Responsible Employment & Workplace Safety
                @endif
            </p>
            
            <div class="contact-info-list">
                <!-- Address -->
                <div class="contact-info-item">
                    <div class="contact-info-icon">📍</div>
                    <div class="contact-info-details">
                        <h4>@if(app()->getLocale() === 'id') Alamat Kantor @else Corporate Office Address @endif</h4>
                        <p>Menara Astra, Lantai 37 Jl. Jend. Sudirman Kav. 5–6 Jakarta Pusat 10220 Indonesia</p>
                    </div>
                </div>
                
                <!-- Advisory Email -->
                <div class="contact-info-item">
                    <div class="contact-info-icon">💼</div>
                    <div class="contact-info-details">
                        <h4>@if(app()->getLocale() === 'id') Pusat Konsultasi dan Kemitraan @else Advisory and Partnership Hub @endif</h4>
                        <p>unangmulkhan@iclo.co.id</p>
                    </div>
                </div>
                
                <!-- Phone -->
                <div class="contact-info-item">
                    <div class="contact-info-icon">📞</div>
                    <div class="contact-info-details">
                        <h4>@if(app()->getLocale() === 'id') Hotline Telepon/WhatsApp @else Phone Hotline/WhatsApp @endif</h4>
                        <p>+62 811-2555-8822 (Mon - Fri, 08.00 - 17.00 WIB)</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Form Wrapper -->
        <div class="contact-form-wrapper">
            <h3 style="font-size: 20px; color: var(--primary-dark); margin-bottom: 24px;">@if(app()->getLocale() === 'id') Formulir Kemitraan @else Partnership Intake Form @endif</h3>
            
            <!-- Session Alert for Success -->
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <!-- Error Alert -->
            @if($errors->any())
                <div style="background-color: #fef2f2; border: 1px solid rgba(239, 68, 68, 0.2); color: #991b1b; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-size: 14px;">
                    <ul style="padding-left: 16px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Form Action -->
            <form action="{{ route('contact.submit') }}" method="POST" id="corporate-contact-form">
                @csrf
                
                <div class="form-group">
                    <label class="form-label" for="contact_name">@if(app()->getLocale() === 'id') Nama Lengkap * @else Full Name * @endif</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="contact_name" name="name" required value="{{ old('name') }}" placeholder="@if(app()->getLocale() === 'id') cth: Budi Santoso @else e.g. John Doe @endif">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="contact_email">@if(app()->getLocale() === 'id') Alamat Email Perusahaan * @else Corporate Email Address * @endif</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="contact_email" name="email" required value="{{ old('email') }}" placeholder="e.g. john.doe@company.com">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="contact_company">@if(app()->getLocale() === 'id') Nama Perusahaan / Institusi @else Company / Institution Name @endif</label>
                    <input type="text" class="form-control" id="contact_company" name="company" value="{{ old('company') }}" placeholder="e.g. PT Resource Energi">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="contact_sector">@if(app()->getLocale() === 'id') Sektor Industri Target * @else Target Industry Sector * @endif</label>
                    <select class="form-control @error('sector') is-invalid @enderror" id="contact_sector" name="sector" required>
                        <option value="">@if(app()->getLocale() === 'id') -- Pilih Sektor -- @else -- Choose Sector -- @endif</option>
                        @if(isset($sectors) && $sectors->count() > 0)
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->slug }}" {{ old('sector') === $sector->slug ? 'selected' : '' }}>
                                    @if(app()->getLocale() === 'id') {{ $sector->name_id }} @else {{ $sector->name_en }} @endif
                                </option>
                            @endforeach
                        @else
                            <!-- Fallback if database is empty -->
                            <option value="other" {{ old('sector') === 'other' ? 'selected' : '' }}>@if(app()->getLocale() === 'id') Lainnya / Konsultasi Kebijakan @else Other / Policy Consultations @endif</option>
                        @endif
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="contact_message">@if(app()->getLocale() === 'id') Persyaratan Konsultasi / Pertanyaan * @else Inquiry / Advisory Requirements * @endif</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="contact_message" name="message" rows="5" required minlength="10" placeholder="@if(app()->getLocale() === 'id') Jelaskan kebutuhan audit keselamatan atau sertifikasi Anda... @else Describe your safety auditing or certification requirements... @endif">{{ old('message') }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary" id="contact-submit-btn" style="width: 100%; font-size: 15px; padding: 12px 20px;">
                    @if(app()->getLocale() === 'id') Kirim Pertanyaan @else Submit Inquiry @endif
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
