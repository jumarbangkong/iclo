@extends('admin.layout')

@section('title', 'Dashboard Overview')

@section('content')
<!-- Stats Counter Grid -->
<div class="admin-stats-grid">
    <div class="admin-stat-card">
        <span class="admin-stat-label">Total Artikel</span>
        <span class="admin-stat-value">{{ $totalArticles }}</span>
    </div>
    
    <div class="admin-stat-card accent">
        <span class="admin-stat-label">Total Penulis (Author)</span>
        <span class="admin-stat-value">{{ $totalAuthors }}</span>
    </div>
    
    <div class="admin-stat-card teal">
        <span class="admin-stat-label">Terbit (Published)</span>
        <span class="admin-stat-value">{{ $publishedCount }}</span>
    </div>
    
    <div class="admin-stat-card">
        <span class="admin-stat-label">Konsep (Draft)</span>
        <span class="admin-stat-value">{{ $draftCount }}</span>
    </div>
</div>

<!-- Quick Action Shortcuts -->
<div class="admin-quick-actions" style="display: flex; gap: 16px; margin-bottom: 32px;">
    <a href="{{ route('admin.articles.create') }}" class="admin-btn admin-btn-primary">
        ➕ Tulis Artikel Baru
    </a>
    <a href="{{ route('admin.authors.create') }}" class="admin-btn admin-btn-accent">
        ➕ Tambah Penulis Baru
    </a>
</div>

<!-- Recent Articles List Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Aktivitas Artikel Terbaru</h2>
        <a href="{{ route('admin.articles.index') }}" style="font-size: 13px; color: var(--primary-light); font-weight: 600; text-decoration: underline;">
            Lihat Semua Artikel
        </a>
    </div>
    
    @if($recentArticles->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul Artikel</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentArticles as $art)
                        <tr>
                            <td style="font-weight: 600; max-width: 320px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $art->title }}
                            </td>
                            <td>
                                {{ $art->author->name }}
                            </td>
                            <td>
                                @if($art->status === 'published')
                                    <span class="admin-badge admin-badge-published">Published</span>
                                @else
                                    <span class="admin-badge admin-badge-draft">Draft</span>
                                @endif
                            </td>
                            <td style="color: var(--text-muted); font-size: 13px;">
                                {{ $art->created_at->format('d M Y H:i') }}
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 8px;">
                                    @if($art->status === 'published')
                                        <a href="{{ route('articles.show', $art->slug) }}" target="_blank" class="admin-btn admin-btn-secondary admin-btn-mini" title="Lihat di Web">
                                            👁️
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.articles.edit', $art->id) }}" class="admin-btn admin-btn-accent admin-btn-mini" title="Edit">
                                        ✏️
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div style="text-align: center; padding: 48px; color: var(--text-muted);">
            <p style="margin: 0; font-size: 14px;">Belum ada artikel yang ditambahkan.</p>
            <a href="{{ route('admin.articles.create') }}" style="margin-top: 12px; display: inline-block; font-size: 13px; color: var(--primary-light); font-weight: bold;">Tulis Artikel Pertama Anda →</a>
        </div>
    @endif
</div>
@endsection
