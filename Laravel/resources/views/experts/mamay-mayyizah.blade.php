@extends('layouts.app')

@section('title', 'Mamay Mayyizah - Accounting & Finance Specialist ICLO')
@section('meta_description', 'Mamay Mayyizah is an accounting and finance professional at ICLO with experience in financial reporting, taxation, auditing, and business advisory services.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/mamay.jpg') }}" alt="Mamay Mayyizah">
        </div>
        <a href="{{ route('about') }}" class="back-link">&lt; @if(app()->getLocale() === 'id') Kembali @else Back @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Mamay Mayyizah</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Spesialis Akuntansi & Keuangan @else Accounting & Finance Specialist @endif</div>
        
        <div class="expert-section">
            <p>
                @if(app()->getLocale() === 'id')
                Mamay Mayyizah adalah seorang profesional di bidang akuntansi dan keuangan dengan pengalaman dalam pelaporan keuangan, perpajakan, audit, dan layanan penasihat bisnis (business advisory). Beliau telah mendampingi klien dalam pemenuhan kepatuhan regulasi, uji tuntas (due diligence), serta peningkatan efisiensi dan tata kelola manajemen keuangan.
                @else
                Mamay Mayyizah is an accounting and finance professional with experience in financial reporting, taxation, auditing, and business advisory services. She has supported clients with regulatory compliance, due diligence, and financial management improvements.
                @endif
            </p>
            <p style="margin-top: 15px;">
                @if(app()->getLocale() === 'id')
                Beliau menyelesaikan Pendidikan Profesi Akuntan di Universitas Tarumanagara, memegang sebutan Associate CA dari Ikatan Akuntan Indonesia (IAI), dan sedang menempuh pendidikan Magister Akuntansi di Universitas Sultan Ageng Tirtayasa. Melalui keahliannya di bidang akuntansi dan keuangan, Mamay turut memperkuat kapasitas analitis dan kepatuhan finansial dalam program-program konsultasi serta riset ICLO.
                @else
                She completed her Professional Accountant Education at Tarumanagara University, holds an Associate CA designation from the Indonesian Institute of Accountants (IAI), and is pursuing a Master’s degree in Accounting at Sultan Ageng Tirtayasa University. Through her specialized accounting and finance expertise, Mamay strengthens analytical rigor and financial compliance across ICLO's advisory and research engagements.
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
