@extends('layouts.app')

@section('title', 'Dr. Syarif Hidayat - Principal Consultant on Chemical and Environmental Safety ICLO')
@section('meta_description', 'Dr. Syarif Hidayat serves as Principal Consultant on Chemical and Environmental Safety at ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/syarif.jpg') }}" alt="Dr. Syarif Hidayat">
        </div>
        <a href="{{ route('about') }}" class="back-link">← @if(app()->getLocale() === 'id') Kembali ke Profil Pakar @else Back to Expert Profiles @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Dr. Syarif Hidayat</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Konsultan Utama Keselamatan Kimia dan Lingkungan @else Principal Consultant on Chemical and Environmental Safety @endif</div>
        
        <div class="expert-section">
            <p>
                Dr. Syarif Hidayat serves as Principal Consultant on Chemical and Environmental Safety at ICLO, providing strategic and technical expertise on chemical safety, environmental risk management, hazardous materials governance, and industrial safety systems. He holds a Ph.D. in Chemical Engineering from Kangwon National University in South Korea, and a Master’s degree from Universiti Brunei Darussalam, strengthening his multidisciplinary expertise in environmental management, industrial processes, and chemical safety governance. With extensive professional experience in hazardous operational environments and wastewater treatment management, he combines strong scientific and technical knowledge with practical operational understanding across complex industrial settings. His expertise includes chemical risk assessment, hazardous substance management, environmental monitoring, industrial process safety, occupational safety integration, and preventive risk mitigation aligned with national regulations and evolving international standards. Through his role at ICLO, he supports companies, institutions, and stakeholders in strengthening environmental and chemical safety governance, improving operational accountability, and developing safer, more sustainable, and internationally aligned industrial practices across high-risk sectors.
            </p>
        </div>
    </div>
</div>
@endsection
