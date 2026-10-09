@extends('admin.layout')

@section('title', 'Kelola Kegiatan (Events)')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <p style="color: var(--text-muted); font-size: 14px; margin: 0;">
        Kelola kegiatan ICLO (events, webinar, post linkedin).
    </p>
    <div>
        <a href="{{ route('admin.activities.create') }}" class="admin-btn admin-btn-primary">
            ➕ Tambah Kegiatan Baru
        </a>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Daftar Kegiatan</h2>
    </div>
    
    @if($activities->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">Image</th>
                        <th>Judul Kegiatan</th>
                        <th>Tanggal</th>
                        <th>LinkedIn Link</th>
                        <th style="text-align: right; width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $act)
                        <tr>
                            <td>
                                @if($act->image)
                                    <img src="{{ $act->image }}" alt="Cover" style="width: 60px; height: 40px; border-radius: 4px; object-fit: cover; border: 1px solid #cbd5e1;">
                                @else
                                    <div style="width: 60px; height: 40px; border-radius: 4px; background-color: #cbd5e1; color: #64748b; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: bold; border: 1px solid #cbd5e1;">
                                        NO IMG
                                    </div>
                                @endif
                            </td>
                            <td style="font-weight: 600;">{{ $act->title }}</td>
                            <td>{{ $act->date ? $act->date->format('d M Y') : '-' }}</td>
                            <td>
                                @if($act->linkedin_url)
                                    <a href="{{ $act->linkedin_url }}" target="_blank" style="color: #0a66c2;">Link</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 8px;">
                                    <a href="{{ route('admin.activities.edit', $act->id) }}" class="admin-btn admin-btn-accent admin-btn-mini" title="Edit">✏️ Edit</a>
                                    <form action="{{ route('admin.activities.destroy', $act->id) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini?');" style="margin: 0; display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn-danger admin-btn-mini" style="font-size: 12px;">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div style="padding: 20px 24px; border-top: 1px solid #e2e8f0; display: flex; justify-content: center;">
            {{ $activities->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 48px; color: var(--text-muted);">
            <p style="margin: 0; font-size: 14px;">Belum ada kegiatan yang ditambahkan.</p>
        </div>
    @endif
</div>
@endsection
