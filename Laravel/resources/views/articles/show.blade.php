@extends('layouts.app')

@section('title', $article->title . ' - ICLO')

@section('content')
<!-- Custom Stylesheet injection for Articles -->
<link rel="stylesheet" href="{{ asset('css/articles.css') }}">

<!-- Article Header -->
<section class="hero-premium" style="min-height: 300px; height: 40vh; text-align: left;">
    <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=2071&auto=format&fit=crop" alt="Article Header" class="hero-premium-bg" style="filter: brightness(0.6);">
    <div class="hero-premium-overlay" style="background: linear-gradient(to right, rgba(15, 26, 92, 0.95), rgba(15, 26, 92, 0.6));"></div>
    <div class="hero-premium-content container" style="padding-top: 0; text-align: left; max-width: 100%;">
        <div style="margin-bottom: 20px; font-size: 14px; color: rgba(255,255,255,0.6);">
            <a href="{{ route('home') }}" style="color: var(--accent);">Beranda</a> &gt; 
            <a href="{{ route('articles.index') }}" style="color: var(--accent);">Artikel</a> &gt; 
            <span style="color: white;">Detail</span>
        </div>
        
        <div class="article-header-meta">
            <span class="badge" style="background: var(--accent); color: var(--primary-dark); font-weight: 700; padding: 3px 8px; border-radius: 4px;">
                {{ $article->category ? $article->category->name : 'Uncategorized' }}
            </span>
            <span><i class="far fa-calendar-alt"></i> {{ $article->created_at->format('d M Y') }}</span>
        </div>
        
        <h1 class="article-hero-title">
            {{ $article->title }}
        </h1>
        
        <div style="display: flex; align-items: center; gap: 12px; margin-top: 24px;">
            @if($article->author->avatar)
                <img src="{{ $article->author->avatar }}" alt="{{ $article->author->name }}" class="author-avatar-mini" style="width: 44px; height: 44px; border-radius: 50%;">
            @else
                <div class="author-avatar-mini" style="width: 44px; height: 44px; font-size: 12px; border-radius: 50%; background: var(--primary); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                    {{ strtoupper(substr($article->author->name, 0, 2)) }}
                </div>
            @endif
            <div>
                <div style="font-weight: 600; color: white;">{{ $article->author->name }}</div>
                <div style="font-size: 12px; color: rgba(255,255,255,0.6);">Pakar & Kontributor ICLO</div>
            </div>
        </div>
    </div>
</section>

<!-- Article Body Content -->
<section style="background-color: white; padding: 20px">
    <div class="container article-detail-layout">
        
        <!-- Left Main Content Column -->
        <div class="article-main-content">
            @if($article->cover_image)
                <img src="{{ $article->cover_image }}" alt="{{ $article->title }}" class="article-featured-image">
            @endif
            
            <div class="entry-content">
                {!! $article->content !!}
            </div>
            
            <!-- Author Bio Card -->
            <div class="author-profile-card">
                @if($article->author->avatar)
                    <img src="{{ $article->author->avatar }}" alt="{{ $article->author->name }}" class="author-profile-avatar">
                @else
                    <div class="author-profile-avatar">
                        {{ strtoupper(substr($article->author->name, 6, 2)) ?: strtoupper(substr($article->author->name, 0, 2)) }}
                    </div>
                @endif
                <div class="author-profile-details">
                    <span class="author-profile-name">{{ $article->author->name }}</span>
                    <p class="author-profile-bio">{{ $article->author->bio ?: 'Kontributor ahli di Indonesian Centre for Labour and Occupational Safety and Health (ICLO).' }}</p>
                    <span class="author-profile-email">📧 {{ $article->author->email }}</span>
                </div>
            </div>
            
            <div style="margin-top: 40px; border-top: 1px solid var(--border-color); padding-top: 30px;">
                <a href="{{ route('articles.index') }}" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 8px;">
                    ← Kembali ke Daftar Artikel
                </a>
            </div>
        </div>
        
        <!-- Right Recommendations Sidebar Column -->
        <aside class="recommendations-sidebar">
            <h3 class="sidebar-title">Artikel Terbaru</h3>
            
            @if($relatedArticles->count() > 0)
                @foreach($relatedArticles as $rel)
                    <div class="sidebar-post">
                        <a href="{{ route('articles.show', $rel->slug) }}" class="sidebar-post-title">
                            {{ $rel->title }}
                        </a>
                        <div class="sidebar-post-date">
                            <span>Oleh {{ $rel->author->name }}</span>
                            <br>
                            <span>{{ $rel->formatted_date }}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <p style="font-size: 14px; color: var(--text-muted); font-style: italic;">Tidak ada artikel rekomendasi saat ini.</p>
            @endif
            
            <div style="background-color: var(--bg-green-tint); border: 2px solid var(--accent); border-radius: 8px; padding: 24px; margin-top: 40px; text-align: center;">
                <h4 style="color: var(--primary-dark); margin-bottom: 12px; font-size: 16px;">Butuh Konsultasi K3?</h4>
                <p style="font-size: 13px; color: var(--text-dark); margin-bottom: 20px; line-height: 1.5;">Tim ahli kami siap membantu audit SMK3 dan menyelaraskan operasional perusahaan Anda.</p>
                <a href="{{ route('contact') }}" class="btn btn-primary" style="font-size: 12px; width: 100%; display: block; box-sizing: border-box; text-align: center;">
                    Hubungi Kami
                </a>
            </div>
        </aside>
        
    </div>
</section>
@endsection
