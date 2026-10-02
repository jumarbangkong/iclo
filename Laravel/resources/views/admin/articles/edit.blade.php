@extends('admin.layout')

@section('title', 'Edit Artikel')

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('admin.articles.index') }}" style="color: var(--primary-light); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
        ← Kembali ke Manajemen Artikel
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Edit Artikel: {{ $article->title }}</h2>
    </div>
    
    <div style="padding: 32px;">
        <!-- Validation Block -->
        @if ($errors->any())
            <div class="admin-alert admin-alert-error">
                <ul style="margin: 0; padding-left: 16px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="admin-article-grid">
                
                <!-- Main Editor Left Side -->
                <div>
                    <div class="admin-form-group">
                        <label for="title" class="admin-form-label">Judul Artikel K3 / Hubungan Kerja</label>
                        <input type="text" name="title" id="title" class="admin-form-input" placeholder="Masukkan judul artikel yang menarik..." value="{{ old('title', $article->title) }}" required>
                    </div>

                    <div class="admin-form-group">
                        <label for="slug" class="admin-form-label">Slug / Permalink URL</label>
                        <input type="text" name="slug" id="slug" class="admin-form-input" placeholder="judul-artikel-otomatis-terbentuk" value="{{ old('slug', $article->slug) }}" required>
                        <span class="admin-form-help">Slug digunakan sebagai alamat web artikel (URL). Contoh: <code>/articles/judul-artikel</code></span>
                    </div>

                    <div class="admin-form-group">
                        <label for="category_id" class="admin-form-label">Kategori Artikel</label>
                        <select name="category_id" id="category_id" class="admin-form-select">
                            <option value="">-- Tanpa Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="admin-form-group">
                        <label for="excerpt" class="admin-form-label">Ringkasan / Excerpt (Pendahuluan Singkat)</label>
                        <textarea name="excerpt" id="excerpt" class="admin-form-textarea" style="min-height: 80px;" placeholder="Tuliskan rangkuman isi artikel sebanyak 1-2 kalimat untuk ditampilkan di halaman depan...">{{ old('excerpt', $article->excerpt) }}</textarea>
                    </div>

                    <div class="admin-form-group">
                        <label for="content" class="admin-form-label">Konten Lengkap Artikel</label>
                        <textarea name="content" id="content" class="admin-form-textarea" style="min-height: 400px;" placeholder="Tuliskan artikel lengkap Anda di sini...">{{ old('content', $article->content) }}</textarea>
                    </div>
                </div>
                
                <!-- Metadata Options Right Side -->
                <div>
                    <div class="admin-form-group">
                        <label for="author_id" class="admin-form-label">Pilih Penulis (Author)</label>
                        <select name="author_id" id="author_id" class="admin-form-select" required>
                            <option value="">-- Pilih Kontributor Ahli --</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id', $article->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                        <span class="admin-form-help">Nama dan profil penulis akan dipajang di halaman artikel publik.</span>
                    </div>

                    <div class="admin-form-group">
                        <label for="status" class="admin-form-label">Status Publikasi</label>
                        <select name="status" id="status" class="admin-form-select" required>
                            <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Konsep (Draft)</option>
                            <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Terbitkan Langsung (Published)</option>
                        </select>
                        <span class="admin-form-help">Gunakan 'Draft' untuk menyembunyikan artikel dari halaman depan.</span>
                    </div>

                    <div class="admin-form-group" style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px;">
                        <label class="admin-form-label">Cover Image Artikel</label>
                        
                        <div class="avatar-preview-container" style="margin-bottom: 16px;">
                            <div class="avatar-preview-box" id="coverPreview" style="width: 100%; height: 120px; border-radius: 6px;">
                                @if($article->cover_image)
                                    <img src="{{ $article->cover_image }}" alt="Cover" style="width:100%; height:100%; object-fit:cover;">
                                @else
                                    <span style="font-size: 24px; color: #cbd5e1;">🖼️</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="admin-form-group" style="margin-bottom: 16px;">
                            <label for="cover_file" style="font-size: 11px; font-weight: bold; display: block; margin-bottom: 4px; color: #475569;">Ganti Gambar Cover</label>
                            <input type="file" name="cover_file" id="cover_file" accept="image/*" class="admin-form-input" style="padding: 6px 12px;">
                        </div>
                        
                        <div class="admin-form-group" style="margin-bottom: 0;">
                            <label for="cover_url" style="font-size: 11px; font-weight: bold; display: block; margin-bottom: 4px; color: #475569;">Ganti via URL Gambar</label>
                            <input type="text" name="cover_url" id="cover_url" class="admin-form-input" placeholder="https://images.unsplash.com/photo-..." value="{{ old('cover_url', $article->cover_image) }}">
                        </div>
                    </div>
                </div>
                
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px; border-top: 1px solid #e2e8f0; padding-top: 24px;">
                <button type="submit" class="admin-btn admin-btn-primary">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.articles.index') }}" class="admin-btn admin-btn-secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        const fileInput = document.getElementById('cover_file');
        const urlInput = document.getElementById('cover_url');
        const previewBox = document.getElementById('coverPreview');

        // Automatic slug generator
        titleInput.addEventListener('input', function() {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            slugInput.value = slug;
        });

        // Cover image preview
        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewBox.innerHTML = `<img src="${e.target.result}" alt="Preview" style="width:100%; height:100%; object-fit:cover;">`;
                }
                reader.readAsDataURL(file);
            }
        });

        urlInput.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                previewBox.innerHTML = `<img src="${this.value}" alt="Preview" style="width:100%; height:100%; object-fit:cover;" onerror="this.parentNode.innerHTML='<span style=\'font-size:24px;color:#ef4444;\'>❌ URL Gambar Rusak</span>'">`;
            } else if (!fileInput.files[0]) {
                previewBox.innerHTML = `@if($article->cover_image)<img src="{{ $article->cover_image }}" alt="Preview" style="width:100%; height:100%; object-fit:cover;">@else<span style="font-size: 24px; color: #cbd5e1;">🖼️</span>@endif`;
            }
        });
    });
</script>

<!-- Tambahkan script TinyMCE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content',
        height: 500,
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
        promotion: false, // Menghilangkan tombol 'Upgrade'
        branding: false // Menghilangkan logo 'Powered by TinyMCE'
    });
</script>
@endsection
