@extends('admin.layout')

@section('title', 'Manajemen Sektor Industri')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <div>
        <h2 style="margin: 0 0 8px 0; font-size: 24px;">Kelola Sektor Industri</h2>
        <p style="margin: 0; color: #64748b;">Sektor digunakan untuk opsi pilihan pada formulir kemitraan kontak.</p>
    </div>
    <a href="{{ route('admin.sectors.create') }}" class="admin-btn admin-btn-primary">
        + Tambah Sektor
    </a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nama Sektor (ID)</th>
                <th>Nama Sektor (EN)</th>
                <th>Slug URL (Value)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sectors as $sector)
                <tr>
                    <td>
                        <div style="font-weight: 600; color: var(--text-dark);">
                            {{ $sector->name_id }}
                        </div>
                    </td>
                    <td>{{ $sector->name_en }}</td>
                    <td><code style="color: #64748b; font-size: 13px;">{{ $sector->slug }}</code></td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <a href="{{ route('admin.sectors.edit', $sector->id) }}" class="admin-btn admin-btn-secondary admin-btn-mini">Edit</a>
                            
                            <form action="{{ route('admin.sectors.destroy', $sector->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sektor ini? Sektor ini akan hilang dari opsi form kontak.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="admin-btn admin-btn-danger admin-btn-mini">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 40px;">
                        <div style="font-size: 40px; margin-bottom: 16px;">🏭</div>
                        <h3 style="margin-bottom: 8px; color: var(--text-dark);">Belum Ada Sektor</h3>
                        <p style="color: #64748b;">Tambahkan sektor pertama Anda untuk ditampilkan di formulir kontak.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
