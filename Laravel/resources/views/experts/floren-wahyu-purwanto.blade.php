@extends('layouts.app')

@section('title', 'Mr. Floren Wahyu Purwanto, SKM - Senior Consultant on Occupational Safety and Health Systems ICLO')
@section('meta_description', 'Mr. Floren Wahyu Purwanto serves as Senior Consultant on Occupational Safety and Health Systems at ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/floren.jpg') }}" alt="Mr. Floren Wahyu Purwanto">
        </div>
        <a href="{{ route('about') }}" class="back-link">← @if(app()->getLocale() === 'id') Kembali ke Profil Pakar @else Back to Expert Profiles @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Floren Wahyu Purwanto, SKM</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Konsultan Senior Sistem K3 @else Senior Consultant on Occupational Safety and Health Systems @endif</div>
        
        <div class="expert-section">
            <p>
                Mr. Floren Wahyu Purwanto serves as Senior Consultant on Occupational Safety and Health Systems at ICLO, bringing extensive expertise in occupational safety and health (OSH) management systems, compliance auditing, and workplace risk governance. He holds a Bachelor’s degree in Public Health with a focus on Occupational Safety and Health, strengthening his technical and practical understanding of workplace safety management across diverse operational settings. With strong professional experience in independent OSH advisory, assessment, and audit services, he has supported organizations in implementing and strengthening ISO 45001, ISO 14001, and SMK3 management systems to improve organizational safety performance and regulatory compliance. His expertise includes OSH system development, compliance assessment, risk management, safety auditing, and preventive workplace governance aligned with national regulations and international standards. Supported by his credentials as a Ministry of Manpower SMK3 Auditor, he contributes to strengthening ICLO’s institutional capacity in delivering practical, credible, and internationally aligned workplace safety and management system solutions across sectors.
            </p>
        </div>
    </div>
</div>
@endsection
