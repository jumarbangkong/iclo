<?php
// Tentukan lokasi target folder storage yang asli
// Asumsi folder "Laravel" berada sejajar dengan "public_html"
$targetFolder = __DIR__ . '/../Laravel/storage/app/public';

// Tentukan lokasi symlink akan dibuat (di dalam public_html)
$linkFolder = __DIR__ . '/storage';

// Eksekusi pembuatan symlink
if (file_exists($linkFolder)) {
    echo "Gagal: Folder/Symlink 'storage' sudah ada di public_html. Silakan hapus dulu jika itu symlink yang salah.";
} else {
    if (symlink($targetFolder, $linkFolder)) {
        echo "SUKSES! Symlink berhasil dibuat. Silakan cek folder public_html Anda.";
    } else {
        echo "ERROR: Gagal membuat symlink. Periksa kembali struktur folder Anda.";
    }
}
?>