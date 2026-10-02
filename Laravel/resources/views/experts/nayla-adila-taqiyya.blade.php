@extends('layouts.app')

@section('title', 'Nayla Adila Taqiyya - Research Assistant ICLO')
@section('meta_description', 'Nayla Adila Taqiyya serves as a Research Assistant at ICLO, dedicated to occupational health and ESG.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <!-- Image filename reference updated to nayla.jpg -->
            <img src="{{ asset('images/nayla.jpg') }}" alt="Nayla Adila Taqiyya">
        </div>
        <a href="{{ route('about') }}" class="back-link">&lt; @if(app()->getLocale() === 'id') Kembali @else Back @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Nayla Adila Taqiyya</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Asisten Riset @else Research Assistant @endif</div>
        
        <div class="expert-section">
            <p>
                @if(app()->getLocale() === 'id')
                Seorang profesional biologi dengan landasan yang kuat dalam ilmu biologi, kesehatan lingkungan, dan penelitian ilmiah. Bersemangat dalam menerapkan pengetahuan biologi untuk memajukan keselamatan dan kesehatan kerja (K3), kesejahteraan pekerja, dan tempat kerja yang berkelanjutan. Berpengalaman dalam penelitian laboratorium dan lapangan, pemantauan lingkungan, analisis data, dan pelaporan ilmiah, dengan komitmen kuat pada solusi berbasis bukti yang mendukung lingkungan kerja yang lebih sehat dan aman.
                @else
                A biology professional with a strong foundation in biological sciences, environmental health, and scientific research. Passionate about applying biological knowledge to advance occupational safety and health (OSH), worker wellbeing, and sustainable workplaces. Experienced in laboratory and field research, environmental monitoring, data analysis, and scientific reporting, with a strong commitment to evidence-based solutions that support healthier and safer working environments.
                @endif
            </p>
            <p style="margin-top: 15px;">
                @if(app()->getLocale() === 'id')
                Dengan minat yang terus berkembang dalam ketenagakerjaan, ESG, dan pendekatan One Health, Nayla berdedikasi untuk mengintegrasikan ilmu biologi dengan kesehatan kerja, manajemen bahaya biologis, pengawasan kesehatan tempat kerja, dan ketahanan iklim. Melalui kolaborasi multidisiplin, ia bertujuan untuk berkontribusi pada penelitian, pengembangan kebijakan, dan inisiatif praktis yang memperkuat perlindungan pekerja dan mempromosikan praktik bisnis yang bertanggung jawab dan berkelanjutan.
                @else
                With a growing interest in labour, ESG, and the One Health approach, Nayla is dedicated to integrating biological science with occupational health, biological hazard management, workplace health surveillance, and climate resilience. Through multidisciplinary collaboration, she aims to contribute to research, policy development, and practical initiatives that strengthen worker protection and promote responsible and sustainable business practices.
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
