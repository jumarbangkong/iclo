@extends('layouts.app')

@section('title', 'Bapak Tauvik Muhammad - Senior OSH Adviser')
@section('meta_description', 'Bapak Tauvik Muhammad serves as the Senior OSH Adviser of ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/tauvik.png') }}" alt="Tauvik Muhammad">
        </div>
        <a href="{{ route('about') }}" class="back-link">← @if(app()->getLocale() === 'id') Kembali ke Profil Pakar @else Back to Expert Profiles @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Tauvik Muhamad</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Senior Advisor @else Senior Advisor @endif</div>
        
        <div class="expert-section">
            <p>
                Tauvik Muhamad is an expert on labour governance and occupational safety and health (OSH). His specialisation is in the application of business and human rights (BHR) frameworks and human rights due diligence (HRDD) to enhance working conditions and sustainable supply chains.
            </p>
            <p>
                His extensive advisory portfolio includes over twenty years of leadership with the International Labour Organization (ILO) across Indonesia and Bangladesh, driving high-impact projects such as the Resilient, Inclusive and Sustainable Supply Chain (RISSC) programme. Equipped with profound expertise in social dialogue, industrial relations and international labour standards, Tauvik brings unparalleled practical authority in labour policies and OSH advocacy. This robust background makes him highly capable of driving actionable policy solutions and comprehensive labour frameworks for Indonesian Center for Labour and Occupational Health and Safety/ OSH - ICLO’s corporate and public sector clients.
            </p>
            <p>
                As the senior advisor at ICLO, Tauvik draws upon his extensive experience managing complex collaborations involving governments, employers, and trade unions. Holding a master’s in public administration from the Lee Kuan Yew School of Public Policy at the National University of Singapore, he possesses a massive portfolio of research and policy publications addressing employment and skills development, labour rights, industrial relations and social protection. His previous leadership as the chief technical adviser for the ILO’s Social Dialogue and Industrial Relations Project further cements his authority in translating complex labour and OSH challenges into sustainable, inclusive and evidence-based industry practices.
            </p>
        </div>
    </div>
</div>
@endsection
