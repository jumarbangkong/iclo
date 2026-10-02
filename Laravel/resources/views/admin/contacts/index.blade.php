@extends('admin.layout')

@section('title', 'Daftar Kontak Masuk')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <p style="color: var(--text-muted); font-size: 14px; margin: 0;">
        Kelola semua pengisian form kontak dari klien atau institusi di halaman ini.
    </p>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('admin.contacts.export.excel') }}" class="admin-btn admin-btn-accent">
            📊 Download Excel
        </a>
        <a href="{{ route('admin.contacts.export.pdf') }}" class="admin-btn admin-btn-secondary">
            📄 Download PDF
        </a>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">Daftar Pengisian Kontak</h2>
    </div>
    
    @if($contacts->count() > 0)
        <div class="table-responsive">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Perusahaan / Instansi</th>
                        <th>Sektor</th>
                        <th>Pesan / Kebutuhan</th>
                        <th style="width: 150px;">Waktu Kirim</th>
                        <th style="width: 150px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td style="font-weight: 600;">{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->company ?: '-' }}</td>
                            <td><span style="background-color: var(--bg-green-tint); padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; color: var(--primary);">{{ strtoupper($contact->sector) }}</span></td>
                            <td style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $contact->message }}">
                                {{ $contact->message }}
                            </td>
                            <td style="color: var(--text-muted); font-size: 13px;">
                                {{ $contact->created_at->format('d M Y, H:i') }}
                            </td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 8px;">
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="admin-btn admin-btn-secondary admin-btn-mini" title="Lihat Detail">
                                        👁️ View
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kontak ini?');" style="margin: 0; display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn admin-btn-danger admin-btn-mini" style="font-size: 12px;">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div style="padding: 20px 24px; border-top: 1px solid #e2e8f0; display: flex; justify-content: center;">
            {{ $contacts->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 48px; color: var(--text-muted);">
            <p style="margin: 0; font-size: 14px;">Belum ada form kontak yang disubmit.</p>
        </div>
    @endif
</div>
@endsection
