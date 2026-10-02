@extends('layouts.app')

@section('title', 'Mr. Agung Satrio Wicaksono - Head of Statistics and Data Analytics ICLO')
@section('meta_description', 'Mr. Agung Satrio Wicaksono serves as Head of Statistics and Data Analytics at ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/agung.jpg') }}" alt="Mr. Agung Satrio Wicaksono">
        </div>
        <a href="{{ route('about') }}" class="back-link">← @if(app()->getLocale() === 'id') Kembali ke Profil Pakar @else Back to Expert Profiles @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Agung Satrio Wicaksono</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Kepala Statistik dan Analitik Data @else Head of Statistics and Data Analytics @endif</div>
        
        <div class="expert-section">
            <p>
                Mr. Agung Satrio Wicaksono serves as Head of Statistics and Data Analytics at ICLO, leading the institution’s quantitative research, statistical analysis, data management, and evidence-based assessment functions across labour governance, occupational safety and health (OSH), ESG, and responsible business initiatives. He holds a Master’s degree in Statistics from IPB University (Bogor), strengthening his expertise in statistical modelling, quantitative methodology, and analytical systems development. His role focuses on managing organizational data systems, research analytics, impact measurement, survey methodology, monitoring and evaluation, and evidence-based reporting to support credible institutional analysis and strategic decision-making. With strong capabilities in transforming complex datasets into actionable insights, he contributes to strengthening ICLO’s analytical rigor, research quality, and data-driven approaches in addressing labour, sustainability, and governance challenges across diverse sectors and operational contexts.
            </p>
        </div>
    </div>
</div>
@endsection
