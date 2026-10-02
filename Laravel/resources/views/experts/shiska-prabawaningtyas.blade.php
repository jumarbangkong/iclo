@extends('layouts.app')

@section('title', 'Dr. Shiska Prabawaningtyas - Academic Advisor')
@section('meta_description', 'Dr. Shiska Prabawaningtyas serves as the Academic Advisor of ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1976&auto=format&fit=crop" alt="Dr. Shiska Prabawaningtyas">
        </div>
        <a href="{{ route('about') }}" class="back-link">&lt; People</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Dr. Shiska Prabawaningtyas</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Penasihat Akademik @else Academic Advisor @endif</div>
        
        <div class="expert-section">
            <p>
                @if(app()->getLocale() === 'id')
                Dr. Shiska Prabawaningtyas adalah seorang akademisi terkemuka dari Universitas Paramadina yang berfokus pada kebijakan sosial, demografi ketenagakerjaan, dan dinamika hubungan industrial di era modern.
                @else
                Dr. Shiska Prabawaningtyas is a distinguished academic from Universitas Paramadina focusing on social policy, labor demographics, and the dynamics of industrial relations in the modern era.
                @endif
            </p>
        </div>

        <div class="expert-section">
            <h3 class="expert-section-title">@if(app()->getLocale() === 'id') Keahlian @else Expertise @endif</h3>
            <p>
                @if(app()->getLocale() === 'id')
                Penelitian dan advokasi beliau menjembatani kesenjangan antara teori akademis dan aplikasi praktis di tempat kerja. Beliau memberikan landasan penelitian yang kuat bagi ICLO untuk mengembangkan solusi inovatif yang menanggapi pergeseran demografis dan tantangan ketenagakerjaan saat ini.
                @else
                Her research and advocacy bridge the gap between academic theory and practical workplace applications. She provides a strong research foundation for ICLO to develop innovative solutions that respond to current demographic shifts and labor challenges.
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
