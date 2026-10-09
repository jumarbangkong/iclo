@extends('admin.layout')

@section('title', 'Tulis Artikel Baru')

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('admin.articles.index') }}" style="color: var(--primary-light); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
        ← Kembali ke Manajemen Artikel
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Editor Publikasi Artikel</h2>
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

        @if($authors->count() == 0)
            <div class="admin-alert admin-alert-error" style="background-color:#fee2e2; color:#991b1b; padding:18px; border-radius:8px;">
                <strong>⚠️ Peringatan Penting:</strong> Anda harus membuat minimal satu penulis (author) terlebih dahulu sebelum dapat menulis artikel!
                <br>
                <a href="{{ route('admin.authors.create') }}" class="admin-btn admin-btn-danger" style="margin-top: 12px; display: inline-block;">Buat Penulis Sekarang</a>
            </div>
        @endif

        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="admin-article-grid">
                
                <!-- Main Editor Left Side -->
                <div>
                    <div class="admin-form-group">
                        <label for="title" class="admin-form-label">Judul Artikel K3 / Hubungan Kerja</label>
                        <input type="text" name="title" id="title" class="admin-form-input" placeholder="Masukkan judul artikel yang menarik..." value="{{ old('title') }}" required>
                    </div>

                    <div class="admin-form-group">
                        <label for="title_en" class="admin-form-label">Judul Artikel K3 / Hubungan Kerja (English)</label>
                        <input type="text" name="title_en" id="title_en" class="admin-form-input" placeholder="Enter an interesting article title..." value="{{ old('title_en') }}">
                    </div>

                    <div class="admin-form-group">
                        <label for="slug" class="admin-form-label">Slug / Permalink URL</label>
                        <input type="text" name="slug" id="slug" class="admin-form-input" placeholder="judul-artikel-otomatis-terbentuk" value="{{ old('slug') }}" required>
                        <span class="admin-form-help">Slug akan digunakan sebagai alamat web artikel (URL). Contoh: <code>/articles/judul-artikel</code></span>
                    </div>

                    <div class="admin-form-group">
                        <label for="category_id" class="admin-form-label">Kategori Artikel</label>
                        <select name="category_id" id="category_id" class="admin-form-select">
                            <option value="">-- Tanpa Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="admin-form-group">
                        <label for="excerpt" class="admin-form-label">Ringkasan / Excerpt (Pendahuluan Singkat)</label>
                        <textarea name="excerpt" id="excerpt" class="admin-form-textarea" style="min-height: 80px;" placeholder="Tuliskan rangkuman isi artikel sebanyak 1-2 kalimat untuk ditampilkan di halaman depan...">{{ old('excerpt') }}</textarea>
                    </div>

                    <div class="admin-form-group">
                        <label for="excerpt_en" class="admin-form-label">Ringkasan / Excerpt (English)</label>
                        <textarea name="excerpt_en" id="excerpt_en" class="admin-form-textarea" style="min-height: 80px;" placeholder="Write a summary of the article... (English)">{{ old('excerpt_en') }}</textarea>
                    </div>

                    <div class="admin-form-group">
                        <label for="content" class="admin-form-label">Konten Lengkap Artikel</label>
                        <textarea name="content" id="content" class="admin-form-textarea" style="min-height: 400px;" placeholder="Tuliskan artikel lengkap Anda di sini...">{{ old('content') }}</textarea>
                    </div>

                    <div class="admin-form-group">
                        <label for="content_en" class="admin-form-label">Konten Lengkap Artikel (English)</label>
                        <textarea name="content_en" id="content_en" class="admin-form-textarea" style="min-height: 400px;" placeholder="Write your full article here...">{{ old('content_en') }}</textarea>
                    </div>
                </div>
                
                <!-- Metadata Options Right Side -->
                <div>
                    <div class="admin-form-group">
                        <label for="author_id" class="admin-form-label">Pilih Penulis (Author)</label>
                        <select name="author_id" id="author_id" class="admin-form-select" required>
                            <option value="">-- Pilih Kontributor Ahli --</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                        <span class="admin-form-help">Nama dan profil penulis akan dipajang di halaman artikel publik.</span>
                    </div>

                    <div class="admin-form-group">
                        <label for="status" class="admin-form-label">Status Publikasi</label>
                        <select name="status" id="status" class="admin-form-select" required>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Konsep (Draft)</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Terbitkan Langsung (Published)</option>
                        </select>
                        <span class="admin-form-help">Gunakan 'Draft' untuk menyimpan sementara tanpa memajang di halaman depan.</span>
                    </div>

                    <div class="admin-form-group">
                        <label for="published_at" class="admin-form-label">Tanggal Publikasi</label>
                        <input type="date" name="published_at" id="published_at" class="admin-form-input" value="{{ old('published_at', date('Y-m-d')) }}">
                        <span class="admin-form-help">Pilih tanggal artikel ini diterbitkan (bisa diubah sesuai keinginan).</span>
                    </div>

                    <div class="admin-form-group" style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px;">
                        <label class="admin-form-label">Cover Image Artikel</label>
                        
                        <div class="avatar-preview-container" style="margin-bottom: 16px;">
                            <div class="avatar-preview-box" id="coverPreview" style="width: 100%; height: 120px; border-radius: 6px;">
                                <span style="font-size: 24px; color: #cbd5e1;">🖼️</span>
                            </div>
                        </div>
                        
                        <div class="admin-form-group" style="margin-bottom: 16px;">
                            <label for="cover_file" style="font-size: 11px; font-weight: bold; display: block; margin-bottom: 4px; color: #475569;">Upload Gambar Cover</label>
                            <input type="file" name="cover_file" id="cover_file" accept="image/*" class="admin-form-input" style="padding: 6px 12px;">
                        </div>
                        
                        <div class="admin-form-group" style="margin-bottom: 0;">
                            <label for="cover_url" style="font-size: 11px; font-weight: bold; display: block; margin-bottom: 4px; color: #475569;">Atau Gunakan URL Gambar</label>
                            <input type="url" name="cover_url" id="cover_url" class="admin-form-input" placeholder="https://images.unsplash.com/photo-..." value="{{ old('cover_url') }}">
                        </div>
                    </div>
                </div>
                
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px; border-top: 1px solid #e2e8f0; padding-top: 24px;">
                <button type="submit" class="admin-btn admin-btn-primary" {{ $authors->count() == 0 ? 'disabled' : '' }}>
                    Simpan Artikel
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
                .replace(/[^a-z0-9\s-]/g, '') // remove invalid chars
                .replace(/\s+/g, '-')         // collapse whitespace and replace by -
                .replace(/-+/g, '-');         // collapse dashes
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
                previewBox.innerHTML = `<span style="font-size: 24px; color: #cbd5e1;">🖼️</span>`;
            }
        });
    });
</script>

<!-- Tambahkan script TinyMCE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content, #content_en',
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
