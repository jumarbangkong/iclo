@extends('layouts.app')

@section('title', 'Dr. Unang Mulkhan - Executive Director ICLO')
@section('meta_description', 'Dr. Unang Mulkhan serves as the Executive Director of ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/unang.webp') }}" alt="Dr. Unang Mulkhan">
        </div>
        <a href="{{ route('about') }}" class="back-link">&lt; @if(app()->getLocale() === 'id') Kembali @else Back @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Dr. Unang Mulkhan</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Direktur Eksekutif @else Executive Director @endif</div>
        
        <div class="expert-section">
            <p>
                Dr. Unang Mulkhan serves as the Executive Director of ICLO, providing strategic leadership in advancing the institution as a credible and trusted platform for labour governance, occupational safety and health (OSH), business and human rights, and responsible business practices in Indonesia. His professional experience spans complex and high-risk sectors including mining, critical minerals, energy, manufacturing, seafood, palm oil, infrastructure, and conservation where he has led and advised on human rights due diligence (HRDD), labour and social risk assessments, stakeholder engagement, ESG integration, and responsible sourcing initiatives. With strong exposure to both Indonesian regulatory realities and evolving international expectations, he brings a practical and solutions-oriented approach that bridges global standards with operational implementation on the ground. Under his leadership, ICLO is positioned not merely as a consulting institution, but as a strategic partner that supports companies, institutions, and stakeholders in strengthening governance systems, managing labour and human rights risks, improving workplace safety and sustainability performance, and building credible pathways toward internationally aligned responsible business conduct.
            </p>
        </div>
    </div>
</div>
@endsection
