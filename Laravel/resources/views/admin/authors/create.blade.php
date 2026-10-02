@extends('admin.layout')

@section('title', 'Tambah Penulis Baru')

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('admin.authors.index') }}" style="color: var(--primary-light); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
        ← Kembali ke Manajemen Penulis
    </a>
</div>

<div class="admin-card" style="max-width: 700px;">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Form Tambah Profil Penulis</h2>
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

        <form action="{{ route('admin.authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="admin-form-group">
                <label for="name" class="admin-form-label">Nama Lengkap & Gelar</label>
                <input type="text" name="name" id="name" class="admin-form-input" placeholder="Contoh: Bapak Indra, SH., MH" value="{{ old('name') }}" required>
                <span class="admin-form-help">Gunakan format nama lengkap disertai gelar untuk dicantumkan di publikasi.</span>
            </div>

            <div class="admin-form-group">
                <label for="email" class="admin-form-label">Alamat Email</label>
                <input type="email" name="email" id="email" class="admin-form-input" placeholder="Contoh: indra@iclo.or.id" value="{{ old('email') }}" required>
                <span class="admin-form-help">Email penulis harus unik di dalam sistem.</span>
            </div>

            <div class="admin-form-group">
                <label for="bio" class="admin-form-label">Biografi Singkat</label>
                <textarea name="bio" id="bio" class="admin-form-textarea" placeholder="Tuliskan keahlian, pengalaman, atau latar belakang kepakaran K3/Ketenagakerjaan...">{{ old('bio') }}</textarea>
                <span class="admin-form-help">Biografi akan tampil di kartu profil penulis di akhir setiap artikel.</span>
            </div>

            <div class="admin-form-group" style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px;">
                <label class="admin-form-label" style="margin-bottom: 12px;">Foto Profil / Avatar</label>
                
                <div class="avatar-preview-container" style="margin-bottom: 16px;">
                    <div class="avatar-preview-box" id="avatarPreview">
                        <span style="font-size: 20px; color: #cbd5e1;">👤</span>
                    </div>
                    <div>
                        <span style="font-size: 13px; font-weight: bold; color: var(--primary-dark);">Pilih salah satu metode di bawah:</span>
                        <p style="font-size: 11px; color: var(--text-muted); margin-top: 4px; margin-bottom: 0;">Upload file gambar langsung dari komputer atau cantumkan URL eksternal.</p>
                    </div>
                </div>
                
                <div class="admin-form-group" style="margin-bottom: 16px;">
                    <label for="avatar_file" style="font-size: 12px; font-weight: bold; display: block; margin-bottom: 4px; color: #475569;">Metode A: Upload File</label>
                    <input type="file" name="avatar_file" id="avatar_file" accept="image/*" class="admin-form-input" style="padding: 6px 12px;">
                </div>
                
                <div class="admin-form-group" style="margin-bottom: 0;">
                    <label for="avatar_url" style="font-size: 12px; font-weight: bold; display: block; margin-bottom: 4px; color: #475569;">Metode B: URL Gambar Eksternal</label>
                    <input type="url" name="avatar_url" id="avatar_url" class="admin-form-input" placeholder="https://images.unsplash.com/photo-..." value="{{ old('avatar_url') }}">
                </div>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 32px; border-top: 1px solid #e2e8f0; padding-top: 24px;">
                <button type="submit" class="admin-btn admin-btn-primary">
                    Simpan Profil Penulis
                </button>
                <a href="{{ route('admin.authors.index') }}" class="admin-btn admin-btn-secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Live image preview helper for files or URLs
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('avatar_file');
        const urlInput = document.getElementById('avatar_url');
        const previewBox = document.getElementById('avatarPreview');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewBox.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                }
                reader.readAsDataURL(file);
            }
        });

        urlInput.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                previewBox.innerHTML = `<img src="${this.value}" alt="Preview" onerror="this.parentNode.innerHTML='<span style=\'font-size:20px;color:#ef4444;\'>❌</span>'">`;
            } else if (!fileInput.files[0]) {
                previewBox.innerHTML = `<span style="font-size: 20px; color: #cbd5e1;">👤</span>`;
            }
        });
    });
</script>
@endsection
