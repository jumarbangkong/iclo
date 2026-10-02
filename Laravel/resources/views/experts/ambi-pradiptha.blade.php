@extends('layouts.app')

@section('title', 'Mr. Ambi Pradiptha, S.K.M., M.KKK - Principal Consultant on Occupational Health and Safety ICLO')
@section('meta_description', 'Mr. Ambi Pradiptha serves as Principal Consultant on Occupational Health and Safety at ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/ambi.jpg') }}" alt="Mr. Ambi Pradiptha, S.K.M., M.KKK">
        </div>
        <a href="{{ route('about') }}" class="back-link">← @if(app()->getLocale() === 'id') Kembali ke Profil Pakar @else Back to Expert Profiles @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Ambi Pradiptha, S.K.M., M.KKK</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Konsultan Utama Keselamatan dan Kesehatan Kerja @else Principal Consultant on Occupational Health and Safety @endif</div>
        
        <div class="expert-section">
            <p>
                Mr. Ambi Pradiptha serves as Principal Consultant on Occupational Health and Safety at ICLO, bringing extensive experience as both an occupational health practitioner and academic with strong expertise in workplace safety management, occupational health systems, and preventive risk governance. He holds Bachelor’s and Master’s degrees in Occupational Health and Safety-related disciplines from Universitas Indonesia, strengthening his technical, analytical, and evidence-based approach in addressing complex workplace health and safety challenges across diverse sectors. His expertise includes hazard identification, occupational risk assessment, incident investigation, workplace health promotion, safety culture development, and OSH management system strengthening aligned with national regulations and international standards. He also has consulting experience in supporting the implementation of ISO 14001 and ISO 45001 management systems, particularly in strengthening environmental management and occupational health and safety governance within organizational operations. Combining academic perspectives with practical field experience, he supports companies and institutions in improving workplace safety performance, strengthening preventive and risk-based safety management approaches, and developing more sustainable and accountable occupational health and safety practices. Through his role at ICLO, he contributes to advancing practical, evidence-driven, and internationally aligned approaches to labour and workplace safety governance.
            </p>
        </div>
    </div>
</div>
@endsection
