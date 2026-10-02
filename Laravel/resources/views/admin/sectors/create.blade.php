@extends('admin.layout')

@section('title', 'Tambah Sektor Industri')

@section('content')
<div style="margin-bottom: 24px;">
    <a href="{{ route('admin.sectors.index') }}" class="back-link" style="color: #64748b; text-decoration: none; font-size: 14px;">
        &larr; Kembali ke Daftar Sektor
    </a>
</div>

<div class="admin-card" style="max-width: 600px;">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Form Tambah Sektor</h2>
    </div>
    
    <div class="admin-card-body" style="padding: 20px;">
        <form action="{{ route('admin.sectors.store') }}" method="POST">
            @csrf
            
            <div class="admin-form-group">
                <label class="admin-form-label" for="name_id">Nama Sektor (Bahasa Indonesia) *</label>
                <input type="text" id="name_id" name="name_id" class="admin-form-input" value="{{ old('name_id') }}" required placeholder="Contoh: Manufaktur & Pabrik">
                @error('name_id')
                    <div style="color: #ef4444; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="admin-form-group">
                <label class="admin-form-label" for="name_en">Nama Sektor (Bahasa Inggris) *</label>
                <input type="text" id="name_en" name="name_en" class="admin-form-input" value="{{ old('name_en') }}" required placeholder="Contoh: Manufacturing & Factories">
                @error('name_en')
                    <div style="color: #ef4444; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="admin-form-group">
                <label class="admin-form-label" for="slug">Slug (Value Formulir) *</label>
                <input type="text" id="slug" name="slug" class="admin-form-input" value="{{ old('slug') }}" required placeholder="Contoh: manufacturing">
                <p style="font-size: 12px; color: #64748b; margin-top: 4px;">Hanya gunakan huruf kecil dan angka, tanpa spasi (bisa pakai strip).</p>
                @error('slug')
                    <div style="color: #ef4444; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <div style="margin-top: 32px; display: flex; gap: 12px;">
                <button type="submit" class="admin-btn admin-btn-primary">Simpan Sektor</button>
                <a href="{{ route('admin.sectors.index') }}" class="admin-btn admin-btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
