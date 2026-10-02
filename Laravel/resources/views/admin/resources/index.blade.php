@extends('admin.layout')

@section('title', 'Kelola Resources')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <p style="color: var(--text-muted); font-size: 14px; margin: 0;">
        Kelola laporan, studi, panduan (guidelines), dan dokumen publikasi (Resources) lainnya di sini.
    </p>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('admin.resource-categories.index') }}" class="admin-btn admin-btn-secondary">
            📑 Kelola Kategori Riset
        </a>
        <a href="{{ route('admin.resources.create') }}" class="admin-btn admin-btn-primary">
            + Tambah Resource Baru
        </a>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Daftar Resources</h2>
    </div>
    
    @if($resources->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 250px;">Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>File / Link</th>
                        <th>Tgl Publikasi</th>
                        <th style="text-align: right; width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resources as $res)
                        <tr>
                            <td style="font-weight: 600; max-width: 250px; overflow: hidden; text-overflow: ellipsis;">
                                {{ $res->title }}
                            </td>
                            <td>
                                <span style="display: inline-block; padding: 4px 8px; background-color: var(--bg-light); border: 1px solid var(--border-color); border-radius: 4px; font-size: 11px; color: var(--text-muted); font-weight: bold;">
                                {{ $res->category ? $res->category->name : 'Uncategorized' }}
                            </span>
                            </td>
                            <td>
                                {{ $res->author ? $res->author->name : 'ICLO Team' }}
                            </td>
                            <td>
                                @if($res->file_path)
                                    <a href="{{ $res->file_path }}" target="_blank" style="color: var(--primary-light); font-size: 12px; font-weight: bold;">[PDF / File]</a>
                                @elseif($res->external_link)
                                    <a href="{{ $res->external_link }}" target="_blank" style="color: var(--accent); font-size: 12px; font-weight: bold;">[Link Luar]</a>
                                @else
                                    <span style="color: var(--text-muted); font-size: 12px;">-</span>
                                @endif
                            </td>
                            <td style="color: var(--text-muted); font-size: 13px;">
                                {{ $res->published_at ? $res->published_at->format('d M Y') : '-' }}
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 8px;">
                                    <a href="{{ route('admin.resources.edit', $res->id) }}" class="admin-btn admin-btn-accent admin-btn-mini" title="Edit">
                                        ✏️ Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.resources.destroy', $res->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus resource ini?');" style="margin: 0; display: inline-block;">
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
            {{ $resources->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 48px; color: var(--text-muted);">
            <p style="margin: 0; font-size: 14px;">Belum ada resource yang ditambahkan.</p>
            <a href="{{ route('admin.resources.create') }}" style="margin-top: 12px; display: inline-block; font-size: 13px; color: var(--primary-light); font-weight: bold;">Tambah Resource Pertama Anda →</a>
        </div>
    @endif
</div>
@endsection
