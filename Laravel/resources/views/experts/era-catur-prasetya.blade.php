@extends('layouts.app')

@section('title', 'dr. Era Catur Prasetya, Sp.KJ - Principal Consultant on Occupational Mental Health and Psychosocial Risk ICLO')
@section('meta_description', 'dr. Era Catur Prasetya, Sp.KJ serves as Principal Consultant on Occupational Mental Health and Psychosocial Risk at ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/catur.jpg') }}" alt="dr. Era Catur Prasetya, Sp.KJ">
        </div>
        <a href="{{ route('about') }}" class="back-link">&lt; @if(app()->getLocale() === 'id') Kembali @else Back @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>dr. Era Catur Prasetya, Sp.KJ</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Konsultan Utama Kesehatan Mental Kerja dan Risiko Psikososial @else Principal Consultant on Occupational Mental Health and Psychosocial Risk @endif</div>
        
        <div class="expert-section">
            <p>
                dr. Era Catur Prasetya, Sp.KJ serves as Principal Consultant on Occupational Mental Health and Psychosocial Risk at ICLO, bringing extensive expertise in psychiatry, occupational mental health, psychosocial risk management, and workplace wellbeing. He completed his Psychiatry Specialist Program (Resident) at the Faculty of Medicine, Airlangga University – Dr. Soetomo General Hospital Surabaya, and earned his Medical Doctor degree from the Faculty of Medicine, Brawijaya University. With strong clinical and professional experience in mental health services and psychosocial assessment, he provides specialized perspectives on the intersection between workplace conditions, psychological wellbeing, productivity, and organizational sustainability. His expertise includes psychosocial risk assessment, workplace stress management, mental health awareness, employee wellbeing, psychological resilience, and preventive approaches to occupational mental health aligned with evolving workplace safety and sustainability standards. Through his role at ICLO, he supports companies and institutions in strengthening healthier, safer, and more inclusive working environments while advancing greater awareness and governance of psychosocial risks and mental wellbeing within modern workplace systems.
            </p>
        </div>
    </div>
</div>
@endsection
