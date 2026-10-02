@extends('admin.layout')

@section('title', 'Detail Kontak Masuk')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <a href="{{ route('admin.contacts.index') }}" class="admin-btn admin-btn-secondary">
        ← Kembali ke Daftar
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Detail Pengisian Kontak (#{{ $contact->id }})</h2>
    </div>
    
    <div style="padding: 24px;">
        <div style="margin-bottom: 20px;">
            <strong style="display: block; color: var(--text-muted); font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Nama Lengkap</strong>
            <div style="font-size: 16px; font-weight: 600; color: var(--primary-dark);">{{ $contact->name }}</div>
        </div>

        <div style="margin-bottom: 20px;">
            <strong style="display: block; color: var(--text-muted); font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Alamat Email</strong>
            <div style="font-size: 15px;"><a href="mailto:{{ $contact->email }}" style="color: var(--primary); text-decoration: none;">{{ $contact->email }}</a></div>
        </div>

        <div style="margin-bottom: 20px;">
            <strong style="display: block; color: var(--text-muted); font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Perusahaan / Instansi</strong>
            <div style="font-size: 15px;">{{ $contact->company ?: '-' }}</div>
        </div>

        <div style="margin-bottom: 20px;">
            <strong style="display: block; color: var(--text-muted); font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Sektor Industri Target</strong>
            <div style="display: inline-block; background-color: var(--bg-green-tint); padding: 4px 10px; border-radius: 4px; font-size: 13px; font-weight: bold; color: var(--primary);">{{ strtoupper($contact->sector) }}</div>
        </div>

        <div style="margin-bottom: 20px;">
            <strong style="display: block; color: var(--text-muted); font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Pesan / Kebutuhan Konsultasi</strong>
            <div style="background-color: var(--bg-light); padding: 16px; border-radius: 8px; border: 1px solid var(--border-color); font-size: 15px; line-height: 1.6; white-space: pre-wrap;">{{ $contact->message }}</div>
        </div>
        
        <div style="margin-bottom: 20px; padding-top: 16px; border-top: 1px solid var(--border-color);">
            <strong style="display: block; color: var(--text-muted); font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Waktu Kirim</strong>
            <div style="font-size: 14px; color: var(--text-muted);">{{ $contact->created_at->format('d M Y, H:i:s') }}</div>
        </div>
    </div>
</div>
@endsection
