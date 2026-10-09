@extends('admin.layout')

@section('title', 'Tambah Kegiatan')

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('admin.activities.index') }}" style="color: var(--primary-light); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
        ← Kembali ke Manajemen Kegiatan
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Form Tambah Kegiatan Baru</h2>
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

        <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="admin-form-group">
                <label for="title" class="admin-form-label">Judul Kegiatan</label>
                <input type="text" name="title" id="title" class="admin-form-input" value="{{ old('title') }}" required>
            </div>

            <div class="admin-form-group">
                <label for="title_en" class="admin-form-label">Judul Kegiatan (English)</label>
                <input type="text" name="title_en" id="title_en" class="admin-form-input" value="{{ old('title_en') }}">
            </div>

            <div class="admin-form-group">
                <label for="date" class="admin-form-label">Tanggal Kegiatan</label>
                <input type="date" name="date" id="date" class="admin-form-input" value="{{ old('date', date('Y-m-d')) }}">
            </div>

            <div class="admin-form-group">
                <label for="linkedin_url" class="admin-form-label">Link LinkedIn (Opsional)</label>
                <input type="url" name="linkedin_url" id="linkedin_url" class="admin-form-input" value="{{ old('linkedin_url') }}" placeholder="https://www.linkedin.com/posts/...">
                <span class="admin-form-help">Jika Anda ingin menghubungkan kegiatan ini ke post LinkedIn ICLO.</span>
            </div>
            
            <div class="admin-form-group">
                <label for="facebook_url" class="admin-form-label">Link Facebook (Opsional)</label>
                <input type="url" name="facebook_url" id="facebook_url" class="admin-form-input" value="{{ old('facebook_url') }}" placeholder="https://www.facebook.com/...">
            </div>

            <div class="admin-form-group">
                <label for="instagram_url" class="admin-form-label">Link Instagram (Opsional)</label>
                <input type="url" name="instagram_url" id="instagram_url" class="admin-form-input" value="{{ old('instagram_url') }}" placeholder="https://www.instagram.com/...">
            </div>

            <div class="admin-form-group">
                <label for="youtube_url" class="admin-form-label">Link YouTube (Opsional)</label>
                <input type="url" name="youtube_url" id="youtube_url" class="admin-form-input" value="{{ old('youtube_url') }}" placeholder="https://www.youtube.com/...">
            </div>

            <div class="admin-form-group">
                <label for="description" class="admin-form-label">Deskripsi Singkat</label>
                <textarea name="description" id="description" class="admin-form-textarea" style="min-height: 100px;">{{ old('description') }}</textarea>
            </div>

            <div class="admin-form-group">
                <label for="description_en" class="admin-form-label">Deskripsi Singkat (English)</label>
                <textarea name="description_en" id="description_en" class="admin-form-textarea" style="min-height: 100px;">{{ old('description_en') }}</textarea>
            </div>

            <div class="admin-form-group">
                <label for="image" class="admin-form-label">Cover Gambar Kegiatan (Utama)</label>
                <input type="file" name="image" id="image" class="admin-form-input" accept="image/*">
            </div>

            <div class="admin-form-group">
                <label for="images" class="admin-form-label">Galeri Foto (Bisa lebih dari 1)</label>
                <input type="file" name="images[]" id="images" class="admin-form-input" accept="image/*" multiple>
            </div>

            <button type="submit" class="admin-btn admin-btn-primary">Simpan Kegiatan</button>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#description',
        height: 400,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; font-size: 16px }',
        promotion: false,
        branding: false
    });
</script>
@endsection
