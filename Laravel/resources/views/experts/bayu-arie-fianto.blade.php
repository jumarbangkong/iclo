@extends('layouts.app')

@section('title', 'Bayu Arie Fianto, PhD - Head of Impact Assessment ICLO')
@section('meta_description', 'Bayu Arie Fianto, PhD serves as the Head of Impact Assessment at ICLO.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/bayu.jpeg') }}" alt="Bayu Arie Fianto, PhD">
        </div>
        <a href="{{ route('about') }}" class="back-link">&lt; @if(app()->getLocale() === 'id') Kembali @else Back @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Bayu Arie Fianto, PhD</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Kepala Asesmen Dampak @else Head of Impact Assessment @endif</div>
        
        <div class="expert-section">
            <p>
                He is an expert for impact measurement and sustainability. His specialisation is in the application of Social Return on Investment (SROI) framework to evaluate and maximise the effectiveness of workforce training programmes by companies/organisations. Backed by his credential as a Social Value & SROI Accredited Practitioner, his extensive consulting portfolio includes leading high-impact advisory projects for the United Nations, UNICEF, USAID, SNV Netherlands Development Organisation, and the Indonesian Financial Services Authority (OJK). Equipped with additional prestigious certifications such as the Certified Sustainability Reporting Specialist (CSRS+), Bayu brings unparalleled practical expertise in ESG assessment, sustainable finance, and policy development. This robust consulting background makes him highly capable of driving actionable social impact solutions and comprehensive sustainability frameworks for ICLO’s corporate and public sector clients.
            </p>
            <p style="margin-top: 15px;">
                He is also an Associate Professor and Director of the Centre for Advanced Resilience and Inclusive Studies at Universitas Airlangga. His PhD in Finance is from Lincoln University in New Zealand. He was the first President of the Indonesia SDGs Centre Network.
            </p>
        </div>
    </div>
</div>
@endsection
