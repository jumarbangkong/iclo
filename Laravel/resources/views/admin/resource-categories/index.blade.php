@extends('admin.layout')

@section('title', 'Manajemen Kategori Riset')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <div>
        <h2 style="margin: 0 0 8px 0; font-size: 24px;">Kelola Kategori Riset</h2>
        <p style="margin: 0; color: #64748b;">Kategori digunakan untuk mengelompokkan data riset agar mudah dicari.</p>
    </div>
    <a href="{{ route('admin.resource-categories.create') }}" class="admin-btn admin-btn-primary">
        + Tambah Kategori
    </a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Slug URL</th>
                <th>Jumlah Resource</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>
                        <div style="font-weight: 600; color: var(--text-dark);">
                            {{ $category->name }}
                        </div>
                    </td>
                    <td><code style="color: #64748b; font-size: 13px;">{{ $category->slug }}</code></td>
                    <td>
                        <span style="display: inline-flex; align-items: center; justify-content: center; background-color: #f1f5f9; color: #475569; font-weight: 600; font-size: 12px; height: 24px; min-width: 24px; padding: 0 8px; border-radius: 12px;">
                            {{ $category->resources_count ?? 0 }} Resource
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <a href="{{ route('admin.resource-categories.edit', $category->id) }}" class="admin-btn admin-btn-secondary admin-btn-mini">Edit</a>
                            
                            <form action="{{ route('admin.resource-categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Semua riset dalam kategori ini mungkin akan terpengaruh.');">
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
                        <div style="font-size: 40px; margin-bottom: 16px;">📑</div>
                        <h3 style="margin-bottom: 8px; color: var(--text-dark);">Belum Ada Kategori</h3>
                        <p style="color: #64748b;">Buat kategori pertama Anda untuk mengelompokkan artikel.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
