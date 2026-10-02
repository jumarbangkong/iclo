@extends('layouts.app')

@section('title', 'Pusat Pengetahuan & Laporan - ICLO')

@section('content')
<!-- Header Banner -->
<section class="hero-premium" style="min-height: 400px; height: 50vh;">
    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=2070&auto=format&fit=crop" alt="Knowledge Hub" class="hero-premium-bg">
    <div class="hero-premium-overlay"></div>
    <div class="hero-premium-content container" style="padding-top: 0;">
        <span class="premium-label" style="color: var(--accent); margin-bottom: 20px;">Knowledge Hub</span>
        <h1 class="hero-title-main" style="margin-bottom: 16px;">{{ __('resources_title') }}</h1>
        <p class="hero-subtitle-main" style="max-width: 700px; margin: 0 auto;">
            {{ __('resources_subtitle') }}
        </p>
    </div>
</section>

<!-- Filter & Search Bar -->
<section style="background-color: var(--bg-light); padding: 40px 0 0 0;">
    <div class="container">
        <div class="resources-filter-bar">
            <!-- Tab category selectors -->
            <div class="resources-tabs">
                <button class="resource-tab-btn active" data-tab="all" id="tab-all">All Resources</button>
                @foreach($categories as $cat)
                    <button class="resource-tab-btn" data-tab="{{ $cat->slug }}" id="tab-{{ $cat->slug }}">{{ $cat->name }}</button>
                @endforeach
            </div>
            
            <!-- Real-time Text Filter -->
            <div class="resources-search">
                <input type="text" id="resource-search" placeholder="Search report title or description..." aria-label="Search resources">
            </div>
        </div>
    </div>
</section>

<!-- Resources Cards Library -->
<section class="section-padding" style="background-color: var(--bg-light); padding-top: 40px;">
    <div class="container">
        <div class="resources-grid" id="resources-grid">
            
            @forelse($resources as $res)
                <div class="resource-card" data-category="{{ $res->category ? $res->category->slug : 'uncategorized' }}">
                    <div class="resource-info">
                        <span class="resource-tag">{{ $res->category ? $res->category->name : 'Uncategorized' }}</span>
                        <h3 class="resource-title">{{ $res->title }}</h3>
                        <div class="resource-meta">
                            Published: {{ $res->published_at ? $res->published_at->format('M Y') : '-' }} | 
                            Author: {{ $res->author ? $res->author->name : 'ICLO Team' }}
                        </div>
                        <p class="resource-description">
                            {{ $res->description ?? 'Tidak ada deskripsi tersedia.' }}
                        </p>
                        
                        @if($res->file_path)
                            <a href="{{ $res->file_path }}" target="_blank" class="btn btn-primary" style="align-self: flex-start; font-size: 12px; padding: 8px 16px; text-decoration: none;">
                                Download / View
                            </a>
                        @elseif($res->external_link)
                            <a href="{{ $res->external_link }}" target="_blank" class="btn btn-primary" style="align-self: flex-start; font-size: 12px; padding: 8px 16px; text-decoration: none;">
                                Download / View
                            </a>
                        @else
                            <button class="btn btn-primary" onclick="alert('File tidak tersedia saat ini.')" style="align-self: flex-start; font-size: 12px; padding: 8px 16px; opacity: 0.5;">
                                Tidak Tersedia
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: var(--text-muted);">
                    <i class="fas fa-file-alt" style="font-size: 48px; margin-bottom: 16px; color: var(--border-color);"></i>
                    <p>Belum ada publikasi atau laporan yang diterbitkan.</p>
                </div>
            @endforelse
            
            <div style="grid-column: 1 / -1; display: flex; justify-content: center; margin-top: 20px;">
                {{ $resources->links() }}
            </div>
            
        </div>
    </div>
</section>
@endsection
