@extends('layouts.app')

@section('title', 'Dr. Ikomatussunniah - Principal Consultant on Labour Governance and Public Policy ICLO')
@section('meta_description', 'Dr. Ikomatussunniah serves as Principal Consultant on Labour Governance and Public Policy at ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/ikomatussunniah.jpg') }}" alt="dr. Ikomatussunniah, M.KKK">
        </div>
        <a href="{{ route('about') }}" class="back-link">← @if(app()->getLocale() === 'id') Kembali ke Profil Pakar @else Back to Expert Profiles @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Dr. Ikomatussunniah</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Konsultan Utama Tata Kelola Ketenagakerjaan dan Kebijakan Publik @else Principal Consultant on Labour Governance and Public Policy @endif</div>
        
        <div class="expert-section">
            <p>
                Dr. Ikomatussunniah serves as Principal Consultant on Labour Governance and Public Policy at ICLO, bringing extensive expertise in labour governance, public policy, industrial relations, and workforce regulation. She holds a Ph.D. in Local Government Studies from Universiti Sains Malaysia (USM), strengthening her interdisciplinary perspective on governance systems, labour policy, and institutional development. With strong academic and research experience, she has led and contributed to a wide range of studies on labour issues, industrial relations, outsourcing systems, minimum wage governance, and migrant worker dynamics. Her expertise combines policy analysis, empirical field research, and regulatory assessment to support evidence-based and practical approaches in addressing labour and governance challenges. Through her role at ICLO, she contributes to strengthening institutional and corporate understanding of labour governance, responsible employment practices, workforce policy development, and regulatory compliance aligned with evolving national and international standards. Her work supports ICLO’s broader mission in advancing accountable, inclusive, and sustainable labour and workplace governance across sectors.
            </p>
        </div>
    </div>
</div>
@endsection
