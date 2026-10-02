@extends('layouts.app')

@section('title', 'Mr. Abdul Darda, SH., MH - Director of Operations ICLO')
@section('meta_description', 'Mr. Abdul Darda serves as the Director of Operations of ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/abduldarda.png') }}" alt="Mr. Abdul Darda">
        </div>
        <a href="{{ route('about') }}" class="back-link">&lt; @if(app()->getLocale() === 'id') Kembali @else Back @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Abdul Darda, SH., MH</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Direktur Operasional @else Director of Operations @endif</div>
        
        <div class="expert-section">
            <p>
                Mr. Abdul Darda serves as Director of Operations at ICLO, overseeing the institution’s operational leadership and strategic implementation across labour governance, occupational safety and health (OSH), compliance, and institutional management. With a strong legal background and professional experience as a legal practitioner, he brings a practical and governance-oriented approach to managing operational systems, regulatory compliance, workplace safety, and organizational risk management. His expertise integrates legal understanding, operational coordination, labour compliance, and OSH management to ensure that ICLO delivers credible, effective, and solutions-driven support to companies and institutions navigating increasingly complex regulatory and sustainability expectations. Through his leadership, ICLO strengthens its institutional capacity to bridge operational realities with responsible business practices, helping clients build safer workplaces, stronger governance systems, and more accountable organizational performance aligned with national and international standards.
            </p>
        </div>
    </div>
</div>
@endsection
