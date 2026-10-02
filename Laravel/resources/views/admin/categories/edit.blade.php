@extends('admin.layout')

@section('title', 'Edit Kategori')

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('admin.categories.index') }}" style="color: var(--primary-light); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
        ← Kembali ke Manajemen Kategori
    </a>
</div>

<div class="admin-card" style="max-width: 600px;">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Edit Kategori: {{ $category->name }}</h2>
    </div>
    
    <div style="padding: 32px;">
        @if ($errors->any())
            <div class="admin-alert admin-alert-error">
                <ul style="margin: 0; padding-left: 16px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="admin-form-group">
                <label for="name" class="admin-form-label">Nama Kategori</label>
                <input type="text" name="name" id="name" class="admin-form-input" placeholder="Contoh: Berita Utama" value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="admin-form-group">
                <label for="slug" class="admin-form-label">Slug URL</label>
                <input type="text" name="slug" id="slug" class="admin-form-input" placeholder="berita-utama" value="{{ old('slug', $category->slug) }}" required>
                <span class="admin-form-help">URL yang ramah mesin pencari. Dihasilkan otomatis.</span>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px;">
                <button type="submit" class="admin-btn admin-btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.categories.index') }}" class="admin-btn admin-btn-secondary">Batal</a>
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
