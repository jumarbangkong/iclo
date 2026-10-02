<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed admin user for the dashboard
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@iclo.or.id'],
            [
                'name' => 'Administrator ICLO',
                'password' => bcrypt('admin123'),
            ]
        );

        // 2. Seed Authors (Founders & Experts)
        $author1 = \App\Models\Author::create([
            'name' => 'Bapak Indra, SH., MH',
            'email' => 'indra@iclo.or.id',
            'bio' => 'Pakar hukum hubungan industrial dan kepatuhan ketenagakerjaan dengan pengalaman lebih dari 15 tahun mendampingi industri strategis di Indonesia.',
            'avatar' => null // will use initials UI
        ]);

        $author2 = \App\Models\Author::create([
            'name' => 'Prof. Unang Mulkhan, MBA., PhD',
            'email' => 'unang.m@iclo.or.id',
            'bio' => 'Lead Academic ICLO, peneliti senior tata kelola K3 nasional, dan konsultan integrasi standar ketenagakerjaan dalam kerangka ESG.',
            'avatar' => null
        ]);

        $author3 = \App\Models\Author::create([
            'name' => 'Bapak Abdul Darda, SH., MH',
            'email' => 'darda.a@iclo.or.id',
            'bio' => 'Konsultan senior kebijakan publik dan auditor SMK3 yang tersertifikasi Kemenaker RI dengan fokus mitigasi risiko kecelakaan kerja.',
            'avatar' => null
        ]);

        // 3. Seed Articles
        \App\Models\Article::create([
            'author_id' => $author2->id,
            'title' => 'Panduan Implementasi K3 dalam Integrasi Kepatuhan ESG Korporasi',
            'slug' => 'panduan-implementasi-k3-integrasi-esg-korporasi',
            'excerpt' => 'Bagaimana standar Keselamatan dan Kesehatan Kerja (K3) menjadi pilar utama dalam pemenuhan kriteria sosial lingkungan (ESG) di industri pertambangan dan smelter Indonesia.',
            'content' => '<h3>Pendahuluan</h3><p>Di era modern, kriteria Environmental, Social, and Governance (ESG) telah bergeser dari sekadar kewajiban moral menjadi komponen strategis yang dinilai oleh investor global. Di Indonesia, khususnya pada sektor padat karya dan berisiko tinggi seperti pertambangan dan peleburan mineral (smelter), aspek Keselamatan dan Kesehatan Kerja (K3) menempati porsi krusial pada pilar **Social (Sosial)**.</p><h3>Mengapa K3 adalah Bagian dari ESG?</h3><p>K3 bukan hanya tentang kepatuhan terhadap regulasi lokal seperti UU No. 1 Tahun 1970, melainkan mencerminkan bagaimana korporasi menghargai hak hidup dan kesejahteraan pekerjanya. Perusahaan dengan tingkat kecelakaan kerja (zero accident) yang konsisten terbukti memiliki nilai keberlanjutan yang lebih tinggi di mata pemegang saham.</p><h3>Langkah Integrasi K3 ke dalam Metrik ESG</h3><p>1. <strong>Transparansi Pelaporan:</strong> Publikasikan metrik Lost Time Injury Frequency Rate (LTIFR) secara berkala.<br>2. <strong>Audit SMK3 Berkelanjutan:</strong> Lakukan sertifikasi Sistem Manajemen K3 nasional secara berkala untuk memvalidasi efektivitas sistem di lapangan.<br>3. <strong>Pelatihan Berbasis BNSP:</strong> Pastikan para pengawas lapangan memegang lisensi kompetensi resmi yang diakui negara.</p><h3>Kesimpulan</h3><p>Mengintegrasikan K3 ke dalam laporan ESG bukan sekadar formalitas administrasi. Ini adalah komitmen nyata untuk membangun industri Indonesia yang aman, manusiawi, dan memiliki daya saing tinggi secara global.</p>',
            'cover_image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1200&q=80',
            'published_at' => now()->subDays(2),
            'status' => 'published'
        ]);

        \App\Models\Article::create([
            'author_id' => $author1->id,
            'title' => 'Aspek Hukum Hubungan Industrial & Perlindungan Hak Pekerja Kontrak',
            'slug' => 'aspek-hukum-hubungan-industrial-hak-pekerja-kontrak',
            'excerpt' => 'Analisis mendalam mengenai implementasi UU Cipta Kerja terhadap status hubungan kerja PKWT/PKWTT dan mitigasi risiko sengketa ketenagakerjaan bagi manajemen perusahaan.',
            'content' => '<h3>Memahami PKWT dan PKWTT Pasca UU Cipta Kerja</h3><p>Dinamika regulasi ketenagakerjaan di Indonesia pasca berlakunya Undang-Undang Cipta Kerja membawa perubahan signifikan bagi mekanisme Perjanjian Kerja Waktu Tertentu (PKWT) dan Perjanjian Kerja Waktu Tidak Tertentu (PKWTT). Perubahan ini menuntut manajemen kepersonaliaan (HR) untuk lebih cermat guna menghindari tuntutan hukum di kemudian hari.</p><h3>Mitigasi Risiko Hukum Hubungan Industrial</h3><p>Perusahaan disarankan melakukan langkah preventif berikut:<br>- <strong>Pencatatan Resmi:</strong> Pastikan setiap kontrak kerja PKWT didaftarkan ke Dinas Ketenagakerjaan setempat secara online.<br>- <strong>Kompensasi Kerja:</strong> Sesuai aturan terbaru, pekerja kontrak berhak mendapatkan uang kompensasi pada saat berakhirnya jangka waktu PKWT.<br>- <strong>Audit Kepatuhan Internal:</strong> Tinjau kembali klausul kontrak agar tidak bertentangan dengan hak-hak normatif pekerja.</p><h3>Penutup</h3><p>Kepatuhan hukum adalah investasi, bukan beban. Hubungan industrial yang harmonis antara pekerja dan pengusaha adalah kunci utama produktivitas bisnis yang berkelanjutan.</p>',
            'cover_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80',
            'published_at' => now()->subDays(5),
            'status' => 'published'
        ]);

        \App\Models\Article::create([
            'author_id' => $author3->id,
            'title' => 'Strategi Mencapai Kategori Emas dalam Audit Kepatuhan SMK3 Nasional',
            'slug' => 'strategi-mencapai-kategori-emas-audit-smk3',
            'excerpt' => 'Panduan taktis bagi panitia pembina keselamatan kerja (P2K3) dalam memenuhi 166 kriteria penilaian audit SMK3 dari Kemenaker RI.',
            'content' => '<h3>Pentingnya Audit SMK3</h3><p>Sistem Manajemen Keselamatan dan Kesehatan Kerja (SMK3) adalah bagian dari sistem manajemen perusahaan secara keseluruhan dalam rangka pengendalian risiko yang berkaitan dengan kegiatan kerja. Untuk mendapatkan sertifikasi resmi dengan bendera emas (kategori memuaskan), perusahaan harus menunjukkan kepatuhan di atas 85% dari total kriteria.</p><h3>Tips Sukses Persiapan Audit</h3><p>Berikut adalah beberapa strategi inti:<br>1. <strong>Komitmen Manajemen Puncak:</strong> Pastikan kebijakan K3 tertulis ditandatangani oleh Direksi dan dipahami oleh seluruh lini organisasi.<br>2. <strong>Dokumentasi HIRADC yang Valid:</strong> Identifikasi bahaya, penilaian risiko, dan pengendalian risiko (HIRADC) harus diperbarui berkala.<br>3. <strong>Simulasi Keadaan Darurat:</strong> Latih kesiapsiagaan seluruh karyawan melalui drill evakuasi kebakaran dan kecelakaan secara rutin.</p><h3>Kesimpulan</h3><p>Sertifikat emas SMK3 bukan hanya pajangan di dinding kantor. Ia merupakan bukti sah bahwa operasional perusahaan Anda berjalan dengan memprioritaskan keselamatan jiwa pekerja di atas segalanya.</p>',
            'cover_image' => 'https://images.unsplash.com/photo-1581094288338-2314dddb7eed?auto=format&fit=crop&w=1200&q=80',
            'published_at' => now()->subDays(8),
            'status' => 'published'
        ]);

        \App\Models\Article::create([
            'author_id' => $author2->id,
            'title' => 'Pentingnya Sertifikasi BNSP dalam Standardisasi Kompetensi Profesi K3',
            'slug' => 'pentingnya-sertifikasi-bnsp-kompetensi-k3',
            'excerpt' => 'Mengapa memegang lisensi kompetensi profesi dari BNSP memberikan jaminan kualitas bagi individu dan meningkatkan kredibilitas keselamatan di tingkat perusahaan.',
            'content' => '<h3>Pendahuluan</h3><p>Keahlian tanpa sertifikasi resmi sering kali sulit divalidasi. Di Indonesia, Badan Nasional Sertifikasi Profesi (BNSP) adalah lembaga independen yang dibentuk pemerintah untuk memberikan lisensi kompetensi kerja. Di bidang K3, sertifikasi BNSP menjadi tolok ukur utama profesionalisme kerja.</p><h3>Manfaat Memiliki Sertifikasi BNSP K3</h3><p>1. <strong>Bagi Pekerja:</strong> Meningkatkan nilai tawar profesional, membuka peluang promosi jabatan, dan membuktikan kapasitas teknis.<br>2. <strong>Bagi Perusahaan:</strong> Memenuhi persyaratan wajib dalam tender proyek pemerintah maupun swasta, serta meminimalkan human error di area produksi.</p><h3>LSP ICLO sebagai Mitra Kredibel</h3><p>Melalui skema sertifikasi terakreditasi, LSP ICLO terus mendampingi ribuan praktisi keselamatan kerja di seluruh Indonesia agar tersertifikasi BNSP dengan kompetensi kelas dunia.</p>',
            'cover_image' => 'https://images.unsplash.com/photo-1521791136368-1a8b25757655?auto=format&fit=crop&w=1200&q=80',
            'published_at' => now()->subDays(12),
            'status' => 'published'
        ]);

        // 4. Seed Sectors
        $sectors = [
            ['slug' => 'mining', 'name_id' => 'Pertambangan Nikel & Ekstraksi', 'name_en' => 'Nickel Mining & Extraction'],
            ['slug' => 'smelter', 'name_id' => 'Smelter & Metalurgi', 'name_en' => 'Smelters & Metallurgy'],
            ['slug' => 'palmoil', 'name_id' => 'Minyak Sawit & Perkebunan', 'name_en' => 'Palm Oil & Plantations'],
            ['slug' => 'manufacturing', 'name_id' => 'Manufaktur & Pabrik', 'name_en' => 'Manufacturing & Factories'],
            ['slug' => 'energy', 'name_id' => 'Energi & Pembangkit Listrik', 'name_en' => 'Energy & Power Plants'],
            ['slug' => 'other', 'name_id' => 'Lainnya / Konsultasi Kebijakan', 'name_en' => 'Other / Policy Consultations']
        ];
        foreach ($sectors as $sector) {
            \App\Models\Sector::updateOrCreate(['slug' => $sector['slug']], $sector);
        }
    }
}
