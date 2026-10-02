@extends('layouts.app')

@section('title', 'Muhammad Nur Ar Royyan - Research Fellow ICLO')
@section('meta_description', 'Muhammad Nur Ar Royyan serves as a Research Fellow at ICLO, specializing in development economics, Just Transition, and sustainable development.')

@section('content')
<div class="expert-profile-container">
    <div class="expert-sidebar">
        <div class="expert-photo-wrapper">
            <img src="{{ asset('images/royyan.jpg') }}" alt="Muhammad Nur Ar Royyan">
        </div>
        <a href="{{ route('about') }}" class="back-link">&lt; @if(app()->getLocale() === 'id') Kembali @else Back @endif</a>
    </div>
    
    <div class="expert-main-content">
        <h1>Muhammad Nur Ar Royyan</h1>
        <div class="expert-role">@if(app()->getLocale() === 'id') Research Fellow @else Research Fellow @endif</div>
        
        <div class="expert-section">
            <p>
                @if(app()->getLocale() === 'id')
                Muhammad Nur Ar Royyan Mas adalah seorang profesional berdedikasi dengan landasan yang kuat di bidang ekonomi, politik iklim internasional, dan pembangunan berkelanjutan. Spesialisasinya terletak pada persimpangan antara ekonomi pembangunan, serta inisiatif Transisi Berkeadilan (Just Transition) dan transisi energi. Didukung oleh pendidikan di bidang Studi Asia di Universität Bonn dan gelar Sarjana Ekonomi, Royyan membawa pendekatan analitis pada riset sosial-ekonomi. Perjalanan profesionalnya mencakup peran-peran berdampak seperti mendukung divisi Politik Iklim Internasional di Germanwatch e.V., di mana ia secara aktif memantau kebijakan Just Transition, terlibat dalam dialog dengan masyarakat sipil dan negosiasi iklim global, serta pengalaman sebelumnya di Deutsche Gesellschaft für Internationale Zusammenarbeit (GIZ). Perpaduan dinamis antara advokasi kebijakan dan riset ekonomi ini membuatnya sangat mampu mendorong wawasan berbasis bukti dan kerangka keberlanjutan yang komprehensif bagi klien sektor publik maupun korporat ICLO.
                @else
                Muhammad Nur Ar Royyan Mas is a dedicated professional with a robust foundation in economics, international climate politics, and sustainable development. His specialisation lies in the intersection of development economics, and Just Transition and energy transition initiatives. Backed by his academic progression in Asian Studies at the Universität Bonn and a Bachelor’s degree in Economics, Royyan brings an analytical approach to socio-economic research. His professional trajectory includes impactful roles such as supporting the International Climate Politics division at Germanwatch e.V., where he actively monitors Just Transition policies, engages in dialogues with civil society and global climate negotiations, as well as his previous experience at Deutsche Gesellschaft für Internationale Zusammenarbeit (GIZ). This dynamic blend of policy advocacy and economic research makes him highly capable of driving evidence-based insights and comprehensive sustainability frameworks for ICLO’s corporate and public sector clients.
                @endif
            </p>
            <p style="margin-top: 15px;">
                @if(app()->getLocale() === 'id')
                Sebagai Research Fellow di ICLO, ia memanfaatkan pengalamannya menavigasi lingkungan institusi yang kompleks, bersama dengan perannya sebagai pemimpin yang diakui dalam masyarakat sipil, yang dibuktikan dengan masa jabatannya sebagai Ketua Perhimpunan Pelajar Indonesia (PPI) di Jerman dan penerimaan beasiswa DAAD STIBET I untuk keterlibatan sipil yang luar biasa. Komitmennya yang mendalam terhadap dialog demokratis dan kerja sama lintas agama semakin memperkuat kemampuannya untuk menerjemahkan riset sosial-politik yang kompleks menjadi praktik industri yang dapat ditindaklanjuti, inklusif, dan berbasis bukti.
                @else
                As a Research Fellow at ICLO, he leverages his experience navigating complex institutional environments, along with his role as a recognised leader in civil society, demonstrated by his tenure as the Chairman of the Indonesian Student's Association in Germany and his receipt of the DAAD STIBET I scholarship for outstanding civic engagement. His profound commitment to democratic dialogues and inter-faith cooperation further cements his capability to translate complex socio-political research into actionable, inclusive, and evidence-based industry practices.
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
