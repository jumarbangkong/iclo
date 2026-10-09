@extends('layouts.app')

@section('title', $activity->title . ' - ICLO')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        corePlugins: { preflight: false, container: false },
        theme: {
            extend: {
                colors: {
                    brand: {
                        50: '#f0f9ff',
                        100: '#e0f2fe',
                        500: '#0ea5e9',
                        600: '#0284c7',
                        900: '#0c4a6e',
                    }
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                }
            }
        }
    }
</script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .kegiatan-detail {
        font-family: 'Inter', sans-serif;
        background-color: #f8fafc;
    }
</style>

<div class="kegiatan-detail py-6 md:py-10 text-slate-800 antialiased selection:bg-brand-500 selection:text-white">
    <div class="container">
        
        <!-- Header / Back button -->
        <div class="mb-4">
            <a href="{{ route('activities.index') }}" class="inline-flex items-center gap-2 text-brand-600 font-semibold hover:text-brand-800 transition-colors no-underline">
                <i class="fas fa-arrow-left"></i> @if(app()->getLocale() === 'id') Kembali ke Event & News @else Back to Events & News @endif
            </a>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white rounded-[24px] shadow-2xl flex flex-col md:flex-row overflow-hidden border border-slate-100">
            
            <!-- LEFT: Image Slider/Gallery -->
            <div class="w-full md:w-3/5 bg-slate-950 flex flex-col relative flex-shrink-0">
                @php
                    // Ambil semua gambar (cover + galeri)
                    $allImages = [];
                    if($activity->image) {
                        $allImages[] = $activity->image;
                    }
                    foreach($activity->images as $img) {
                        $allImages[] = $img->image_path;
                    }
                @endphp

                <!-- Main Image -->
                <div class="relative flex-grow h-64 md:h-[400px] flex items-center justify-center overflow-hidden">
                    @if(count($allImages) > 0)
                        <img id="main-image" src="{{ $allImages[0] }}" alt="{{ $activity->title }}" class="max-w-full max-h-full object-contain transition-opacity duration-300">
                    @endif
                    
                    @if(count($allImages) > 1)
                    <!-- Panah Navigasi -->
                    <button onclick="prevImg()" class="absolute left-4 top-1/2 -translate-y-1/2 p-3 bg-black/40 hover:bg-black/80 text-white rounded-full backdrop-blur-sm transition-all z-10 hover:scale-110 border-0 cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button onclick="nextImg()" class="absolute right-4 top-1/2 -translate-y-1/2 p-3 bg-black/40 hover:bg-black/80 text-white rounded-full backdrop-blur-sm transition-all z-10 hover:scale-110 border-0 cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                    @endif
                </div>
                
                @if(count($allImages) > 1)
                <!-- Thumbnails -->
                <div class="h-20 bg-slate-900 p-3 flex gap-2 overflow-x-auto border-t border-slate-800" style="scrollbar-width: thin;">
                    @foreach($allImages as $idx => $img)
                        <img src="{{ $img }}" onclick="setImg({{ $idx }})" class="thumb-detail h-full w-24 object-cover rounded-md cursor-pointer transition-all duration-300 flex-shrink-0 {{ $idx == 0 ? 'ring-2 ring-brand-500 opacity-100' : 'opacity-40 hover:opacity-80' }}">
                    @endforeach
                </div>
                @endif
            </div>

            <!-- RIGHT: Details -->
            <div class="w-full md:w-2/5 p-6 md:p-8 flex flex-col text-left bg-white">
                <div class="flex items-center gap-3 mb-5">
                    @if($activity->date)
                        <span class="text-sm text-slate-500 font-medium flex items-center gap-2">
                            <i class="far fa-calendar-alt text-brand-500"></i> {{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}
                        </span>
                    @endif
                </div>
                
                <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4 leading-tight mt-0" style="line-height: 1.2;">
                    {{ $activity->title }}
                </h1>
                
                <div class="prose prose-slate text-slate-600 mb-6 overflow-y-auto" style="font-size: 15px; max-width: 100%; max-height: 250px; scrollbar-width: thin;">
                    {!! $activity->description !!}
                </div>

                <!-- Social Media Buttons -->
                <div class="mt-auto pt-4 border-t border-slate-100">
                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-3">@if(app()->getLocale() === 'id') Lihat Postingan Lengkap di: @else View Full Post On: @endif</h4>
                    <div class="flex flex-wrap gap-3">
                        @if($activity->linkedin_url)
                            <a href="{{ $activity->linkedin_url }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#0077b5] hover:bg-[#005e93] text-white rounded-lg font-medium transition-colors text-sm shadow-md no-underline">
                                <i class="fab fa-linkedin text-lg"></i> LinkedIn
                            </a>
                        @endif

                        @if($activity->instagram_url)
                            <a href="{{ $activity->instagram_url }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-[#f09433] via-[#e6683c] to-[#bc1888] hover:opacity-90 text-white rounded-lg font-medium transition-colors text-sm shadow-md no-underline">
                                <i class="fab fa-instagram text-lg"></i> Instagram
                            </a>
                        @endif

                        @if($activity->facebook_url)
                            <a href="{{ $activity->facebook_url }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#1877f2] hover:bg-[#166fe5] text-white rounded-lg font-medium transition-colors text-sm shadow-md no-underline">
                                <i class="fab fa-facebook text-lg"></i> Facebook
                            </a>
                        @endif

                        @if($activity->youtube_url)
                            <a href="{{ $activity->youtube_url }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#ff0000] hover:bg-[#cc0000] text-white rounded-lg font-medium transition-colors text-sm shadow-md no-underline">
                                <i class="fab fa-youtube text-lg"></i> YouTube
                            </a>
                        @endif
                        
                        @if(!$activity->linkedin_url && !$activity->instagram_url && !$activity->facebook_url && !$activity->youtube_url)
                            <span class="text-slate-400 text-sm italic">@if(app()->getLocale() === 'id') Tautan sosial media belum tersedia. @else Social media links are not available. @endif</span>
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@if(count($allImages) > 1)
<script>
    const allImages = @json($allImages);
    let currentIdx = 0;

    function updateMainImg() {
        const main = document.getElementById('main-image');
        main.style.opacity = '0.4';
        setTimeout(() => {
            main.src = allImages[currentIdx];
            main.style.opacity = '1';
        }, 150);

        const thumbs = document.querySelectorAll('.thumb-detail');
        thumbs.forEach((t, i) => {
            if(i === currentIdx) {
                t.style.opacity = '1';
                t.style.boxShadow = '0 0 0 2px #0ea5e9';
            } else {
                t.style.opacity = '0.4';
                t.style.boxShadow = 'none';
            }
        });
    }

    function prevImg() {
        currentIdx = currentIdx > 0 ? currentIdx - 1 : allImages.length - 1;
        updateMainImg();
    }

    function nextImg() {
        currentIdx = currentIdx < allImages.length - 1 ? currentIdx + 1 : 0;
        updateMainImg();
    }

    function setImg(idx) {
        currentIdx = idx;
        updateMainImg();
    }
</script>
@endif

@endsection
