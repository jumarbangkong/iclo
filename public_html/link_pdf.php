<?php
// Target folder tempat PDF nyasar
$targetFolder = __DIR__ . '/../Laravel/public/uploads/resources';

// Lokasi symlink akan diletakkan di public_html
$linkFolder = __DIR__ . '/uploads/resources';

if (file_exists($linkFolder)) {
    echo "Gagal: Folder/Symlink 'resources' sudah ada. Hapus folder kosong tersebut dulu jika ada.";
} else {
    if (symlink($targetFolder, $linkFolder)) {
        echo "SUKSES! Symlink resources berhasil dibuat.";
    } else {
        echo "ERROR: Gagal membuat symlink.";
    }
}
?>