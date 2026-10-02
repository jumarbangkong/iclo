@extends('admin.layout')

@section('title', 'Kelola Artikel')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <p style="color: var(--text-muted); font-size: 14px; margin: 0;">
        Kelola tulisan publikasi, panduan audit K3, dan artikel hubungan industrial ICLO di sini.
    </p>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('admin.categories.index') }}" class="admin-btn admin-btn-secondary">
            📑 Kelola Kategori
        </a>
        <a href="{{ route('admin.articles.create') }}" class="admin-btn admin-btn-primary">
            ➕ Tulis Artikel Baru
        </a>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Daftar Artikel</h2>
    </div>
    
    @if($articles->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">Cover</th>
                        <th>Judul Artikel</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Tanggal Rilis</th>
                        <th style="text-align: right; width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $art)
                        <tr>
                            <td>
                                @if($art->cover_image)
                                    <img src="{{ $art->cover_image }}" alt="Cover" style="width: 60px; height: 40px; border-radius: 4px; object-fit: cover; border: 1px solid #cbd5e1;">
                                @else
                                    <div style="width: 60px; height: 40px; border-radius: 4px; background-color: #cbd5e1; color: #64748b; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: bold; border: 1px solid #cbd5e1;">
                                        NO IMG
                                    </div>
                                @endif
                            </td>
                            <td style="font-weight: 600; max-width: 280px; overflow: hidden; text-overflow: ellipsis;">
                                {{ $art->title }}
                            </td>
                            <td>
                                {{ $art->category ? $art->category->name : '-' }}
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
                                {{ $art->published_at ? $art->published_at->format('d M Y H:i') : '-' }}
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 8px;">
                                    @if($art->status === 'published')
                                        <a href="{{ route('articles.show', $art->slug) }}" target="_blank" class="admin-btn admin-btn-secondary admin-btn-mini" title="Lihat Artikel di Web">
                                            👁️ View
                                        </a>
                                    @endif
                                    
                                    <a href="{{ route('admin.articles.edit', $art->id) }}" class="admin-btn admin-btn-accent admin-btn-mini" title="Edit">
                                        ✏️ Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" style="margin: 0; display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn-danger admin-btn-mini" style="font-size: 12px;">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div style="padding: 20px 24px; border-top: 1px solid #e2e8f0; display: flex; justify-content: center;">
            {{ $articles->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 48px; color: var(--text-muted);">
            <p style="margin: 0; font-size: 14px;">Belum ada artikel yang ditulis.</p>
            <a href="{{ route('admin.articles.create') }}" style="margin-top: 12px; display: inline-block; font-size: 13px; color: var(--primary-light); font-weight: bold;">Tulis Artikel Pertama Anda →</a>
        </div>
    @endif
</div>
@endsection
