@extends('layouts.app')

@section('title', 'Sertifikasi LSP ICLO - BNSP')

@section('content')
<!-- Header Banner -->
<section class="hero-premium" style="min-height: 400px; height: 50vh;">
    <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=2070&auto=format&fit=crop" alt="Certification LSP" class="hero-premium-bg">
    <div class="hero-premium-overlay"></div>
    <div class="hero-premium-content container" style="padding-top: 0;">
        <span class="premium-label" style="color: var(--accent); margin-bottom: 20px;">Lembaga Sertifikasi Profesi</span>
        <h1 class="hero-title-main" style="margin-bottom: 16px;">{{ __('lsp_title') }}</h1>
        <p class="hero-subtitle-main" style="max-width: 700px; margin: 0 auto;">
            {{ __('lsp_subtitle') }}
        </p>
    </div>
</section>

<!-- BNSP Info & Interactive Wizard -->
<section class="section-padding" style="background-color: white;">
    <div class="container lsp-grid">
        <!-- Process Timeline -->
        <div>
            <span class="section-subtitle">Process Flow</span>
            <h2 style="font-size: 32px; margin-top: 16px; margin-bottom: 16px;">How to Get Certified</h2>
            <p style="color: var(--text-muted); margin-bottom: 30px;">
                Our certification flows follow official BNSP guidelines to verify your qualifications objectively and securely.
            </p>
            
            <div class="lsp-steps-timeline">
                <!-- Step 1 -->
                <div class="lsp-timeline-item active" id="timeline-step-1">
                    <div class="lsp-timeline-num">1</div>
                    <h3 class="lsp-timeline-title">Submit Registration Details</h3>
                    <p class="lsp-timeline-desc">Provide personal profiles and select your targeted BNSP occupational scheme.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="lsp-timeline-item" id="timeline-step-2">
                    <div class="lsp-timeline-num">2</div>
                    <h3 class="lsp-timeline-title">Upload Prerequisites</h3>
                    <p class="lsp-timeline-desc">Submit documents showing education, work history, and prior basic safety certificates.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="lsp-timeline-item" id="timeline-step-3">
                    <div class="lsp-timeline-num">3</div>
                    <h3 class="lsp-timeline-title">Competency Assessment</h3>
                    <p class="lsp-timeline-desc">Undergo portfolio check, written examination, and interviews with licensed assessors.</p>
                </div>
                
                <!-- Step 4 -->
                <div class="lsp-timeline-item" id="timeline-step-4">
                    <div class="lsp-timeline-num">4</div>
                    <h3 class="lsp-timeline-title">BNSP Certificate Issuance</h3>
                    <p class="lsp-timeline-desc">Successful assessors will be granted a national license valid for 3 years.</p>
                </div>
            </div>
        </div>
        
        <!-- Registration Wizard Card -->
        <div class="lsp-wizard-card">
            <div class="wizard-steps-indicator">
                <span class="wizard-step-indicator-item active" id="ind-step-1">1. PROFILE</span>
                <span class="wizard-step-indicator-item" id="ind-step-2">2. SCHEME</span>
                <span class="wizard-step-indicator-item" id="ind-step-3">3. VALIDATION</span>
            </div>
            
            <!-- Main Form Wrapper -->
            <form id="lsp-wizard-form" onsubmit="event.preventDefault();">
                <div id="wizard-form-inputs">
                    <!-- Step 1: Personal Profile -->
                    <div class="wizard-step-content active" data-step="0">
                        <h3 style="font-size: 20px; margin-bottom: 20px; color: var(--primary);">Personal Profile</h3>
                        
                        <div class="form-group">
                            <label class="form-label" for="reg_name">Full Name (with titles) *</label>
                            <input type="text" class="form-control" id="reg_name" required placeholder="e.g. Budi Santoso, S.T.">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="reg_email">Email Address *</label>
                            <input type="email" class="form-control" id="reg_email" required placeholder="e.g. budi@company.com">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="reg_phone">Phone / WhatsApp *</label>
                            <input type="text" class="form-control" id="reg_phone" required placeholder="e.g. +62 812-3456-7890">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="reg_company">Current Employer / Organization</label>
                            <input type="text" class="form-control" id="reg_company" placeholder="e.g. PT Minerals Indonesia">
                        </div>
                    </div>
                    
                    <!-- Step 2: Select Scheme -->
                    <div class="wizard-step-content" data-step="1">
                        <h3 style="font-size: 20px; margin-bottom: 20px; color: var(--primary);">Certification Scheme</h3>
                        
                        <div class="form-group">
                            <label class="form-label" for="reg_scheme">Select BNSP Scheme *</label>
                            <select class="form-control" id="reg_scheme" required>
                                <option value="">-- Choose Scheme --</option>
                                <option value="general_k3">Ahli K3 Umum (General OSH Specialist)</option>
                                <option value="auditor_smk3">Auditor SMK3 (National Auditor)</option>
                                <option value="officer_k3">Petugas K3 (Safety Officer)</option>
                                <option value="him_k3">HSE Manager (Manajer K3)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="reg_industry">Your Industry Sector *</label>
                            <select class="form-control" id="reg_industry" required>
                                <option value="">-- Choose Sector --</option>
                                <option value="mining">Nickel Mining & Extraction</option>
                                <option value="smelter">Smelters & Metallurgy</option>
                                <option value="palmoil">Palm Oil & Plantations</option>
                                <option value="manufacturing">Manufacturing</option>
                                <option value="construction">Construction & Energy</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Step 3: Prerequisites Verification -->
                    <div class="wizard-step-content" data-step="2">
                        <h3 style="font-size: 20px; margin-bottom: 20px; color: var(--primary);">Prerequisites & Validation</h3>
                        
                        <div class="form-group">
                            <label class="form-label">Prior safety training certificate exists? *</label>
                            <div style="display: flex; gap: 16px; margin-top: 8px;">
                                <label style="display: flex; align-items: center; gap: 6px; font-size: 14px; cursor: pointer;">
                                    <input type="radio" name="prior_cert" value="yes" checked> Yes, I have it
                                </label>
                                <label style="display: flex; align-items: center; gap: 6px; font-size: 14px; cursor: pointer;">
                                    <input type="radio" name="prior_cert" value="no"> No, I need preparation
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group" style="margin-top: 24px;">
                            <label style="display: flex; gap: 8px; font-size: 12px; line-height: 1.4; cursor: pointer;">
                                <input type="checkbox" id="reg_agree" required style="margin-top: 2px;">
                                I declare that all provided documents and statements are true and represent my authentic credentials.
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Success State Output Block (Initially Hidden) -->
                <div id="wizard-success-block" style="display: none; text-align: center;">
                    <div style="font-size: 60px; color: var(--accent); margin-bottom: 20px;">✓</div>
                    <h3 style="font-size: 24px; color: var(--primary-dark); margin-bottom: 12px;">Registration Successful!</h3>
                    <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 24px; line-height: 1.5;">
                        Thank you, <strong id="summary-name">User</strong>, for registering with LSP ICLO. <br>
                        Your application for the <strong><span id="summary-scheme">Scheme</span></strong> has been received. Our administrators will verify your qualifications and email your upload link within 1 working day.
                    </p>
                    <a href="{{ route('home') }}" class="btn btn-primary" style="margin: 0 auto;">Return to Home</a>
                </div>
                
                <!-- Action Navigation Buttons -->
                <div class="wizard-buttons">
                    <button type="button" class="btn btn-outline" id="wizard-prev-btn" style="border-color: var(--primary); color: var(--primary); visibility: hidden;">Back</button>
                    <button type="button" class="btn btn-primary" id="wizard-next-btn">Next</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- LSP Integration Hooks info -->
<section class="section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color); text-align: center;">
    <div class="container" style="max-width: 700px;">
        <span class="section-subtitle">Integration Ready</span>
        <h2 style="font-size: 26px; margin-top: 12px; margin-bottom: 16px;">API Hooking & External Portals</h2>
        <p style="color: var(--text-muted); font-size: 14px; line-height: 1.5;">
            Our portal is built using high-performance hooks prepared to connect directly with the government's official BNSP certification registry database, enabling real-time status lookups and automated documentation scoring.
        </p>
    </div>
</section>
@endsection
