@extends('admin.layout')

@section('title', 'Pengaturan Akun Admin')

@section('content')
<div style="margin-bottom: 24px;">
    <h2 style="margin: 0 0 8px 0; font-size: 24px;">Pengaturan Akun</h2>
    <p style="margin: 0; color: #64748b;">Perbarui alamat email atau kata sandi (password) Anda di sini.</p>
</div>

<div class="admin-card" style="max-width: 600px;">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Form Pengaturan Akun</h2>
    </div>
    
    <div class="admin-card-body" style="padding: 20px;">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Email -->
            <div class="admin-form-group">
                <label class="admin-form-label" for="email">Alamat Email *</label>
                <input type="email" id="email" name="email" class="admin-form-input" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div style="color: #ef4444; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Password -->
            <div class="admin-form-group" style="margin-top: 24px;">
                <label class="admin-form-label" for="password">Password Baru</label>
                <input type="password" id="password" name="password" class="admin-form-input" placeholder="Biarkan kosong jika tidak ingin mengubah password">
                <p style="font-size: 12px; color: #64748b; margin-top: 4px;">Minimal 6 karakter.</p>
                @error('password')
                    <div style="color: #ef4444; font-size: 13px; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Password Confirmation -->
            <div class="admin-form-group">
                <label class="admin-form-label" for="password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="admin-form-input" placeholder="Ketik ulang password baru Anda">
            </div>
            
            <!-- Submit Button -->
            <div style="margin-top: 32px; display: flex; gap: 12px;">
                <button type="submit" class="admin-btn admin-btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
