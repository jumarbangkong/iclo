@extends('layouts.app')

@section('title', __('articles_title') . ' - ICLO')

@section('content')
<!-- Custom Stylesheet injection for Articles -->
<link rel="stylesheet" href="{{ asset('css/articles.css') }}">

<!-- Header Banner -->
<section class="hero-premium" style="min-height: 400px; height: 50vh;">
    <img src="https://images.unsplash.com/photo-1434626881859-194d67b2b86f?q=80&w=2074&auto=format&fit=crop" alt="Articles and Insights" class="hero-premium-bg">
    <div class="hero-premium-overlay"></div>
    <div class="hero-premium-content container" style="padding-top: 0;">
        <span class="premium-label" style="color: var(--accent); margin-bottom: 20px;">{{ __('nav_articles') }} & Insights</span>
        <h1 class="hero-title-main" style="margin-bottom: 16px;">{{ __('articles_title') }}</h1>
        <p class="hero-subtitle-main" style="max-width: 700px; margin: 0 auto;">
            {{ __('articles_subtitle') }}
        </p>
    </div>
</section>

<!-- Search Section -->
<section class="articles-search-section">
    <div class="container">
        <form action="{{ route('articles.index') }}" method="GET" class="search-container">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari artikel K3, hubungan industrial atau regulasi..." class="search-input" aria-label="Search articles">
            <button type="submit" class="btn btn-primary" style="padding: 10px 24px; font-size: 14px;">
                Cari
            </button>
            @if(request('q') || request('category'))
                <a href="{{ route('articles.index') }}" class="btn" style="background-color: #cbd5e1; color: #334155; padding: 10px 18px; font-size: 14px; display: inline-flex; align-items: center; border-radius: 6px;">
                    Reset
                </a>
            @endif
        </form>
    </div>
</section>

<!-- Articles Grid Library -->
<section class="section-padding" style="background-color: var(--bg-light); padding-top: 20px;">
    <div class="container">
        @if($articles->count() > 0)
            <div class="articles-grid">
                @foreach($articles as $article)
                    <article class="article-card" id="article-card-{{ $article->id }}">
                        <div class="article-image-wrapper">
                            @if($article->cover_image)
                                <img src="{{ $article->cover_image }}" alt="{{ $article->title }}" class="article-image" loading="lazy">
                            @else
                                <div style="display:flex; align-items:center; justify-content:center; height:100%; color:rgba(255,255,255,0.3); font-weight:bold; font-size:18px;">
                                    ICLO Insight
                                </div>
                            @endif
                            @if($article->category)
                                <a href="{{ route('articles.index', ['category' => $article->category->slug]) }}" class="article-badge" style="text-decoration: none; z-index: 2;">
                                    {{ $article->category->name }}
                                </a>
                            @else
                                <span class="article-badge">Uncategorized</span>
                            @endif
                        </div>
                        
                        <div class="article-body">
                            <h3 class="article-card-title">
                                <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="article-card-excerpt">
                                {{ Str::limit(strip_tags($article->excerpt ?: $article->content), 120) }}
                            </p>
                            
                            <div class="article-author-footer">
                                @if($article->author->avatar)
                                    <img src="{{ $article->author->avatar }}" alt="{{ $article->author->name }}" class="author-avatar-mini">
                                @else
                                    <div class="author-avatar-mini">
                                        {{ strtoupper(substr($article->author->name, 6, 2)) ?: strtoupper(substr($article->author->name, 0, 2)) }}
                                    </div>
                                @endif
                                <div class="author-meta-text">
                                    <span class="author-name-text">{{ $article->author->name }}</span>
                                    <span class="article-date-text">{{ $article->formatted_date }} · {{ $article->reading_time }} min read</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            
            <div class="pagination-wrapper">
                {{ $articles->links() }}
            </div>
        @else
            <div style="text-align: center; padding: 60px 0;">
                <div style="font-size: 48px; margin-bottom: 16px;">🔍</div>
                <h3 style="color: var(--primary-dark); margin-bottom: 8px;">Tidak Ada Artikel Ditemukan</h3>
                <p style="color: var(--text-muted); max-width: 500px; margin: 0 auto 24px auto;">Kami tidak dapat menemukan hasil untuk "{{ request('q') }}". Coba gunakan kata kunci yang lebih umum atau periksa ejaan Anda.</p>
                <a href="{{ route('articles.index') }}" class="btn btn-primary">Lihat Semua Artikel</a>
            </div>
        @endif
    </div>
</section>
@endsection
