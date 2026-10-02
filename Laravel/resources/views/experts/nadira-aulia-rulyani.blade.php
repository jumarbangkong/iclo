@extends('layouts.app')

@section('title', 'Ms. Nadira Aulia Rulyani - Program Manager for Digital OSH ICLO')
@section('meta_description', 'Ms. Nadira Aulia Rulyani serves as Program Manager for Digital OSH at ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/nadira.jpg') }}" alt="Ms. Nadira Aulia Rulyani">
        </div>
        <a href="{{ route('about') }}" class="back-link">← @if(app()->getLocale() === 'id') Kembali ke Profil Pakar @else Back to Expert Profiles @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Nadira Aulia Rulyani</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Manajer Program untuk OSH Digital @else Program Manager for Digital OSH @endif</div>
        
        <div class="expert-section">
            <p>
                Ms. Nadira Aulia Rulyani serves as Program Manager for Digital OSH at ICLO, leading the institution’s initiatives on digital transformation, smart technology integration, and data-driven approaches for occupational safety and health (OSH) governance. With strong expertise in digital platform optimization, technology adoption, data analytics, and project coordination, she plays a key role in advancing innovative and future-oriented approaches to workplace safety management and organizational governance. Her work focuses on integrating digital systems, intelligent workflows, and evidence-based operational tools to strengthen monitoring, reporting, risk management, and institutional effectiveness within OSH and labour governance frameworks. Through her role at ICLO, she contributes to developing more adaptive, technology-driven, and sustainable approaches that support organizations and industries in responding to evolving workplace challenges, operational complexities, and international expectations on modern safety and governance systems.
            </p>
        </div>
    </div>
</div>
@endsection
