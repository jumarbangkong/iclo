@extends('layouts.app')

@section('title', 'Mr. Dimas Bayu Arya Putra - Research Manager ICLO')
@section('meta_description', 'Mr. Dimas Bayu Arya Putra serves as Research Manager at ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/dimas_new.jpg') }}" alt="Mr. Dimas Bayu Arya Putra">
        </div>
        <a href="{{ route('about') }}" class="back-link">&lt; @if(app()->getLocale() === 'id') Kembali @else Back @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Dimas Bayu Arya Putra</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Manajer Riset @else Research Manager @endif</div>
        
        <div class="expert-section">
            <p>
                Mr. Dimas Bayu Arya Putra serves as Research Manager at ICLO, leading the institution’s research and knowledge development functions across labour governance, occupational safety and health (OSH), business and human rights, and responsible business practices. He oversees the design, coordination, and implementation of research initiatives, assessments, and evidence-based studies that support ICLO’s strategic engagements with companies, institutions, development partners, and other stakeholders. With strong expertise in mixed-method research, stakeholder engagement, data analysis, and policy-oriented assessment, he plays a key role in translating complex field findings and governance challenges into practical, credible, and actionable insights. Through his leadership in research management and analytical coordination, ICLO strengthens its position as a trusted institution that delivers grounded, evidence-driven, and context-sensitive solutions to support more accountable, sustainable, and internationally aligned workplace and business practices.
            </p>
        </div>
    </div>
</div>
@endsection
