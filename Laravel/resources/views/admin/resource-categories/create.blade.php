@extends('admin.layout')

@section('title', 'Tambah Kategori Riset')

@section('content')
<div style="margin-bottom: 24px;">
    <a href="{{ route('admin.resource-categories.index') }}" style="color: var(--text-muted); text-decoration: none; font-size: 14px;">
        &larr; Kembali ke Daftar
    </a>
</div>

<div class="admin-card" style="max-width: 600px;">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Form Tambah Kategori Riset</h2>
    </div>
    
    <div class="admin-card-body" style="padding: 20px;">
        @if ($errors->any())
            <div class="admin-alert admin-alert-error">
                <ul style="margin: 0; padding-left: 16px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.resource-categories.store') }}" method="POST">
            @csrf
            
            <div class="admin-form-group">
                <label for="name" class="admin-form-label">Nama Kategori</label>
                <input type="text" name="name" id="name" class="admin-form-input" placeholder="Contoh: Berita Utama" value="{{ old('name') }}" required>
            </div>

            <div class="admin-form-group">
                <label for="slug" class="admin-form-label">Slug URL</label>
                <input type="text" name="slug" id="slug" class="admin-form-input" placeholder="berita-utama" value="{{ old('slug') }}" required>
                <span class="admin-form-help">URL yang ramah mesin pencari. Dihasilkan otomatis.</span>
            </div>

            <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 30px;">
                <a href="{{ route('admin.resource-categories.index') }}" class="admin-btn admin-btn-secondary">Batal</a>
                <button type="submit" class="admin-btn admin-btn-primary">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        nameInput.addEventListener('input', function() {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            slugInput.value = slug;
        });
    });
</script>
@endsection
