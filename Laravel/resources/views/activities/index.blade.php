@extends('layouts.app')

@section('title', 'Event and News - ICLO')

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
<style>
    .kegiatan-wrapper {
        font-family: 'Inter', sans-serif;
        background-color: #f8fafc;
    }
    
    /* Animasi kustom untuk kartu galeri saat dimuat */
    .fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Styling untuk scrollbar yang lebih rapi */
    .kegiatan-wrapper ::-webkit-scrollbar {
        width: 8px;
    }
    .kegiatan-wrapper ::-webkit-scrollbar-track {
        background: #f1f5f9; 
    }
    .kegiatan-wrapper ::-webkit-scrollbar-thumb {
        background: #cbd5e1; 
        border-radius: 4px;
    }
    .kegiatan-wrapper ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8; 
    }
</style>

<div class="kegiatan-wrapper text-slate-800 antialiased selection:bg-brand-500 selection:text-white pb-24 pt-10">

    <header class="pt-10 pb-12 text-center container">
        <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-slate-900 mb-4" style="line-height: 1.2;">
            @if(app()->getLocale() === 'id') Event and News @else Events and News @endif
        </h1>
        <p class="text-lg md:text-xl text-slate-600 max-w-2xl mx-auto leading-relaxed mt-4">
            @if(app()->getLocale() === 'id') Merekam setiap momen bermakna dan kegiatan terbaru kami dalam membangun dampak positif bersama. @else Capturing every meaningful moment and our latest activities in building positive impact together. @endif
        </p>
    </header>

    <main class="container">
        
        <!-- Grid Galeri -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="gallery-grid">
            @foreach($activities as $index => $item)
                @php
                    // Ambil semua gambar (cover + galeri)
                    $allImages = [];
                    if($item->image) {
                        $allImages[] = $item->image;
                    } else {
                        $allImages[] = 'https://ui-avatars.com/api/?name='.urlencode($item->title).'&background=cbd5e1&color=ffffff&size=512';
                    }
                    foreach($item->images as $img) {
                        $allImages[] = $img->image_path;
                    }
                    $modalData = [
                         "id" => $item->id,
                         "title" => $item->title,
                         "date" => $item->date ? \Carbon\Carbon::parse($item->date)->format("d M Y") : "",
                         "description" => $item->description,
                         "url" => route("activities.show", $item->slug ?: $item->id),
                         "images" => $allImages
                    ];
                @endphp
                <div class="fade-in-up bg-white rounded-[12px] shadow-sm hover:shadow-xl hover:shadow-brand-500/10 transition-all duration-300 overflow-hidden cursor-pointer group border border-slate-100 flex flex-col" 
                     style="animation-delay: {{ $index * 0.1 }}s"
                     onclick='openModal(@json($modalData))'>
                    
                    <!-- Image Container -->
                    <div class="overflow-hidden h-56 relative bg-slate-100">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors duration-300 z-10"></div>
                        
                        @if(count($allImages) > 1)
                        <!-- Indikator Multiple Photos -->
                        <div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-md text-white text-[11px] font-bold px-2.5 py-1.5 rounded-md z-20 flex items-center gap-1.5 shadow-lg">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ count($allImages) }} Foto
                        </div>
                        @endif

                        <img src="{{ $allImages[0] }}" alt="{{ $item->title }}" loading="lazy" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                    </div>
                    <!-- Content Container -->
                    <div class="p-5 flex flex-col flex-grow">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-xs text-slate-400 font-medium">
                                {{ $item->date ? \Carbon\Carbon::parse($item->date)->format('d M Y') : '' }}
                            </span>
                        </div>
                        <h3 class="text-[17px] font-semibold text-slate-900 mb-2 leading-snug group-hover:text-brand-600 transition-colors">
                            {{ Str::limit($item->title, 60) }}
                        </h3>
                        <div class="text-sm text-slate-500 line-clamp-2 leading-relaxed mt-auto" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ Str::limit(strip_tags($item->description), 100) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-12 flex justify-center">
            {{ $activities->links() }}
        </div>
        
        @if($activities->count() == 0)
        <!-- Pesan Kosong -->
        <div id="empty-state" class="text-center py-20 text-slate-500">
            <svg class="mx-auto h-12 w-12 text-slate-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <p>@if(app()->getLocale() === 'id') Belum ada kegiatan saat ini. @else No activities yet. @endif</p>
        </div>
        @endif
    </main>

    <!-- Lightbox Modal -->
    <div id="modal" class="fixed inset-0 z-[999] flex items-center justify-center p-4 sm:p-6 opacity-0 pointer-events-none transition-opacity duration-300 bg-slate-900/90 backdrop-blur-sm" style="z-index: 9999;">
        <!-- Area luar untuk klik tutup -->
        <div class="absolute inset-0" onclick="closeModal()"></div>
        
        <!-- Konten Modal -->
        <div class="relative bg-white rounded-[16px] shadow-2xl max-w-5xl w-full max-h-[95vh] flex flex-col md:flex-row overflow-hidden transform scale-95 transition-transform duration-300" id="modal-content-box">
            
            <!-- Tombol Tutup -->
            <button onclick="closeModal()" class="absolute top-4 right-4 z-20 p-2 bg-black/50 hover:bg-black/70 text-white rounded-full backdrop-blur-md transition-colors shadow-lg border-0 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <!-- Area Slider Galeri -->
            <div class="w-full md:w-3/5 flex flex-col bg-slate-950 relative flex-shrink-0">
                <!-- Main Image -->
                <div class="relative flex-grow h-64 md:h-[60vh] flex items-center justify-center overflow-hidden">
                    <img id="modal-image" src="" alt="" class="max-w-full max-h-full object-contain transition-opacity duration-300">
                    
                    <!-- Panah Navigasi -->
                    <button onclick="prevImage(event)" id="btn-prev" class="absolute left-4 top-1/2 -translate-y-1/2 p-2.5 bg-black/40 hover:bg-black/80 text-white rounded-full backdrop-blur-sm transition-all z-10 hover:scale-110 border-0 cursor-pointer hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button onclick="nextImage(event)" id="btn-next" class="absolute right-4 top-1/2 -translate-y-1/2 p-2.5 bg-black/40 hover:bg-black/80 text-white rounded-full backdrop-blur-sm transition-all z-10 hover:scale-110 border-0 cursor-pointer hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
                
                <!-- Thumbnails -->
                <div class="h-20 sm:h-24 bg-slate-900 p-3 flex gap-2 overflow-x-auto border-t border-slate-800 scrollbar-hide" id="modal-thumbnails" style="scrollbar-width: none;">
                    <!-- Thumbnails dimuat via JS -->
                </div>
            </div>

            <!-- Detail Modal -->
            <div class="w-full md:w-2/5 p-6 sm:p-8 flex flex-col h-auto md:max-h-[95vh] overflow-y-auto text-left">
                <div class="flex items-center gap-3 mb-4">
                    <span id="modal-date" class="text-sm text-slate-400 font-medium flex items-center gap-1.5"></span>
                </div>
                
                <h2 id="modal-title" class="text-2xl sm:text-3xl font-bold text-slate-900 mb-4 leading-tight mt-0"></h2>
                
                <div class="prose prose-slate prose-sm sm:prose-base text-slate-600 mb-8" style="font-size: 15px; max-width: 100%;">
                    <div id="modal-description" class="leading-relaxed"></div>
                </div>

                <div class="mt-auto pt-6 border-t border-slate-100 flex gap-3">
                    <a id="share-btn" href="#" class="flex-1 flex items-center justify-center gap-2 px-4 py-3 bg-brand-600 hover:bg-brand-700 text-white rounded-lg font-medium transition-colors text-sm shadow-md shadow-brand-500/20 no-underline text-center">
                        @if(app()->getLocale() === 'id') Baca Selengkapnya @else Read More @endif
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    let currentEventImages = [];
    let currentImageIndex = 0;
    const modal = document.getElementById('modal');
    const modalContentBox = document.getElementById('modal-content-box');

    function openModal(data) {
        if (!data) return;

        currentEventImages = data.images || [];
        currentImageIndex = 0;

        // Isi data teks ke modal
        document.getElementById('modal-date').innerText = data.date;
        document.getElementById('modal-title').innerText = data.title;
        document.getElementById('modal-description').innerHTML = data.description;
        document.getElementById('share-btn').href = data.url;

        // Tampilkan tombol navigasi hanya jika foto > 1
        if(currentEventImages.length > 1) {
            document.getElementById('btn-prev').classList.remove('hidden');
            document.getElementById('btn-next').classList.remove('hidden');
        } else {
            document.getElementById('btn-prev').classList.add('hidden');
            document.getElementById('btn-next').classList.add('hidden');
        }

        // Render gambar pertama & thumbnail
        updateCarousel();
        renderThumbnails();

        // Tampilkan Modal dengan efek animasi
        modal.classList.remove('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            modalContentBox.classList.remove('scale-95');
            modalContentBox.classList.add('scale-100');
        }, 50);

        // Mencegah body scroll
        document.body.style.overflow = 'hidden';
    }

    function updateCarousel() {
        const mainImg = document.getElementById('modal-image');
        mainImg.style.opacity = '0.4'; 
        
        setTimeout(() => {
            mainImg.src = currentEventImages[currentImageIndex];
            mainImg.style.opacity = '1';
        }, 150);

        const thumbs = document.querySelectorAll('.thumb-item');
        thumbs.forEach((thumb, idx) => {
            if(idx === currentImageIndex) {
                thumb.style.opacity = '1';
                thumb.style.boxShadow = '0 0 0 2px #0ea5e9';
            } else {
                thumb.style.opacity = '0.4';
                thumb.style.boxShadow = 'none';
            }
        });
    }

    function renderThumbnails() {
        const thumbContainer = document.getElementById('modal-thumbnails');
        thumbContainer.innerHTML = '';
        
        if (currentEventImages.length <= 1) return; // Hide thumbnails if only 1 image

        currentEventImages.forEach((imgUrl, index) => {
            const img = document.createElement('img');
            img.src = imgUrl;
            img.className = `thumb-item h-full w-24 object-cover rounded-md cursor-pointer transition-all duration-300 flex-shrink-0`;
            if(index === currentImageIndex) {
                img.style.opacity = '1';
                img.style.boxShadow = '0 0 0 2px #0ea5e9';
            } else {
                img.style.opacity = '0.4';
            }
            img.onclick = (e) => {
                e.stopPropagation();
                currentImageIndex = index;
                updateCarousel();
            };
            thumbContainer.appendChild(img);
        });
    }

    function prevImage(e) {
        e.stopPropagation();
        if(currentEventImages.length <= 1) return;
        currentImageIndex = (currentImageIndex > 0) ? currentImageIndex - 1 : currentEventImages.length - 1;
        updateCarousel();
    }

    function nextImage(e) {
        e.stopPropagation();
        if(currentEventImages.length <= 1) return;
        currentImageIndex = (currentImageIndex < currentEventImages.length - 1) ? currentImageIndex + 1 : 0;
        updateCarousel();
    }

    function closeModal() {
        modalContentBox.classList.remove('scale-100');
        modalContentBox.classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('opacity-0', 'pointer-events-none');
        }, 100);

        document.body.style.overflow = 'auto';
    }

    document.addEventListener('keydown', function(event) {
        if (!modal.classList.contains('opacity-0')) {
            if (event.key === "Escape") {
                closeModal();
            } else if (event.key === "ArrowLeft") {
                prevImage(event);
            } else if (event.key === "ArrowRight") {
                nextImage(event);
            }
        }
    });
</script>
@endsection
