@extends('admin.layout')

@section('title', 'Edit Resource')

@section('content')
<div style="margin-bottom: 24px;">
    <a href="{{ route('admin.resources.index') }}" style="color: var(--text-muted); text-decoration: none; font-size: 14px;">
        &larr; Kembali ke Daftar
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Form Edit Resource</h2>
    </div>
    
    <div class="admin-card-body" style="padding: 24px;">
        <form action="{{ route('admin.resources.update', $resource->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 20px;">
                <label class="admin-form-label" for="title">Judul Resource / Laporan *</label>
                <input type="text" id="title" name="title" class="admin-form-input" value="{{ old('title', $resource->title) }}" required>
                @error('title')
                    <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="admin-form-grid">
                <div>
                    <label class="admin-form-label" for="resource_category_id">Kategori *</label>
                    <select id="resource_category_id" name="resource_category_id" class="admin-form-input" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('resource_category_id', $resource->resource_category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('resource_category_id')
                        <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label class="admin-form-label" for="author_id">Penulis (Opsional)</label>
                    <select id="author_id" name="author_id" class="admin-form-input">
                        <option value="">-- Atas Nama ICLO --</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id', $resource->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label class="admin-form-label" for="description">Deskripsi Singkat (Opsional)</label>
                <textarea id="description" name="description" class="admin-form-input" rows="4">{{ old('description', $resource->description) }}</textarea>
                @error('description')
                    <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 30px; padding: 20px; background: var(--bg-light); border: 1px dashed var(--border-color); border-radius: 8px;">
                <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 14px; color: var(--primary-dark);">File Saat Ini</h4>
                
                @if($resource->file_path)
                    <div style="margin-bottom: 12px; font-size: 13px;">
                        File terunggah: <a href="{{ $resource->file_path }}" target="_blank" style="color: var(--primary); font-weight: bold;">Lihat File</a>
                    </div>
                @endif
                
                <div style="margin-bottom: 16px;">
                    <label class="admin-form-label" for="file_upload">Ganti File (PDF/Word/Excel)</label>
                    <input type="file" id="file_upload" name="file_upload" class="admin-form-input" style="padding: 10px;">
                    <small style="color: var(--text-muted);">Biarkan kosong jika tidak ingin mengganti file. Max: 10MB.</small>
                    @error('file_upload')
                        <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label class="admin-form-label" for="external_link">ATAU Tautan Eksternal</label>
                    <input type="url" id="external_link" name="external_link" class="admin-form-input" value="{{ old('external_link', $resource->external_link) }}" placeholder="https://...">
                    @error('external_link')
                        <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div style="display: flex; gap: 12px; justify-content: flex-end;">
                <a href="{{ route('admin.resources.index') }}" class="admin-btn admin-btn-secondary">Batal</a>
                <button type="submit" class="admin-btn admin-btn-primary">Update Resource</button>
            </div>
        </form>
    </div>
</div>
@endsection
