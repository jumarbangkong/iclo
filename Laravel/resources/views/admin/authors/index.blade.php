@extends('admin.layout')

@section('title', 'Kelola Penulis (Authors)')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <p style="color: var(--text-muted); font-size: 14px; margin: 0;">
        Penulis digunakan untuk menugaskan kepemilikan dan melampirkan profil ke setiap artikel K3.
    </p>
    <a href="{{ route('admin.authors.create') }}" class="admin-btn admin-btn-primary">
        ➕ Tambah Penulis Baru
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Daftar Penulis Terdaftar</h2>
    </div>
    
    @if($authors->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 70px;">Avatar</th>
                        <th>Nama Penulis</th>
                        <th>Email</th>
                        <th style="max-width: 300px;">Biografi Singkat</th>
                        <th>Artikel</th>
                        <th style="text-align: right; width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>
                                @if($author->avatar)
                                    <img src="{{ $author->avatar }}" alt="{{ $author->name }}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 1px solid #cbd5e1;">
                                @else
                                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: var(--primary); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 14px; border: 1px solid #cbd5e1;">
                                        {{ strtoupper(substr($author->name, 6, 2)) ?: strtoupper(substr($author->name, 0, 2)) }}
                                    </div>
                                @endif
                            </td>
                            <td style="font-weight: 600;">
                                {{ $author->name }}
                            </td>
                            <td style="font-family: monospace; font-size: 13px;">
                                {{ $author->email }}
                            </td>
                            <td style="color: var(--text-muted); font-size: 13px; max-width: 300px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                {{ $author->bio ?: 'Belum ada biografi ditambahkan.' }}
                            </td>
                            <td style="font-weight: bold;">
                                {{ $author->articles_count }}
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 8px;">
                                    <a href="{{ route('admin.authors.edit', $author->id) }}" class="admin-btn admin-btn-accent admin-btn-mini" title="Edit">
                                        ✏️ Edit
                                    </a>
                                    
                                    <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penulis ini? Semua artikel yang ditulis oleh penulis ini juga akan ikut terhapus!');" style="margin: 0; display: inline-block;">
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
    @else
        <div style="text-align: center; padding: 48px; color: var(--text-muted);">
            <p style="margin: 0; font-size: 14px;">Belum ada penulis terdaftar.</p>
            <a href="{{ route('admin.authors.create') }}" style="margin-top: 12px; display: inline-block; font-size: 13px; color: var(--primary-light); font-weight: bold;">Tambah Penulis Pertama Anda →</a>
        </div>
    @endif
</div>
@endsection
