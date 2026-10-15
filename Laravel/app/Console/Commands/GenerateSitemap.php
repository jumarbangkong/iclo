<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Article;
use App\Models\Activity;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml otomatis untuk ICLO (halaman publik, artikel, aktivitas, profil pakar)';

    public function handle()
    {
        $this->info('Memulai pembuatan sitemap.xml...');

        $sitemap = Sitemap::create();

        // Tentukan base URL (prioritaskan domain produksi https://iclo.co.id jika di localhost)
        $baseUrl = config('app.url', 'https://iclo.co.id');
        if (str_contains($baseUrl, '127.0.0.1') || str_contains($baseUrl, 'localhost') || empty($baseUrl)) {
            $baseUrl = 'https://iclo.co.id';
        }
        $baseUrl = rtrim($baseUrl, '/');

        // 1. Halaman Statis / Menu Utama (Halaman Admin & Login dikecualikan)
        $staticPages = [
            ['path' => '/', 'priority' => 1.0, 'freq' => Url::CHANGE_FREQUENCY_DAILY],
            ['path' => '/about', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['path' => '/services', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['path' => '/sectors', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['path' => '/resources', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['path' => '/lsp', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['path' => '/contact', 'priority' => 0.7, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['path' => '/articles', 'priority' => 0.9, 'freq' => Url::CHANGE_FREQUENCY_DAILY],
            ['path' => '/activities', 'priority' => 0.9, 'freq' => Url::CHANGE_FREQUENCY_DAILY],
        ];

        foreach ($staticPages as $page) {
            $sitemap->add(
                Url::create($page['path'] === '/' ? $baseUrl : $baseUrl . $page['path'])
                    ->setPriority($page['priority'])
                    ->setChangeFrequency($page['freq'])
            );
        }
        $this->line('- Halaman utama & statis ditambahkan.');

        // 2. Halaman Profil Experts / Pakar
        $expertFiles = glob(resource_path('views/experts/*.blade.php'));
        $expertCount = 0;
        if (!empty($expertFiles)) {
            foreach ($expertFiles as $file) {
                $slug = basename($file, '.blade.php');
                $sitemap->add(
                    Url::create("{$baseUrl}/experts/{$slug}")
                        ->setPriority(0.7)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );
                $expertCount++;
            }
        } else {
            // Fallback daftar pakar
            $experts = [
                'unang-mulkhan', 'abdul-darda', 'tauvik-muhammad', 'dimas-bayu-arya-putra',
                'syarif-hidayat', 'ambi-pradiptha', 'floren-wahyu-purwanto', 'ikomatussunniah',
                'era-catur-prasetya', 'nadira-aulia-rulyani', 'agung-satrio-wicaksono',
                'bayu-arie-fianto', 'nayla-adila-taqiyya', 'muhammad-nur-ar-royyan',
                'shiska-prabawaningtyas',
            ];
            foreach ($experts as $slug) {
                $sitemap->add(
                    Url::create("{$baseUrl}/experts/{$slug}")
                        ->setPriority(0.7)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );
                $expertCount++;
            }
        }
        $this->line("- Profil experts ditambahkan ({$expertCount} pakar).");

        // 3. Artikel (Hanya yang status published)
        $articleCount = 0;
        if (class_exists(Article::class)) {
            Article::where('status', 'published')
                ->orderBy('published_at', 'desc')
                ->get()
                ->each(function (Article $article) use ($sitemap, $baseUrl, &$articleCount) {
                    $url = Url::create("{$baseUrl}/articles/{$article->slug}")
                        ->setPriority(0.8)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);

                    if ($article->updated_at) {
                        $url->setLastModificationDate($article->updated_at);
                    } elseif ($article->published_at) {
                        $url->setLastModificationDate($article->published_at);
                    }

                    $sitemap->add($url);
                    $articleCount++;
                });
        }
        $this->line("- Artikel publik ditambahkan ({$articleCount} artikel).");

        // 4. Aktivitas
        $activityCount = 0;
        if (class_exists(Activity::class)) {
            Activity::orderBy('date', 'desc')
                ->get()
                ->each(function (Activity $activity) use ($sitemap, $baseUrl, &$activityCount) {
                    $slug = $activity->slug ?: $activity->id;
                    $url = Url::create("{$baseUrl}/activities/{$slug}")
                        ->setPriority(0.8)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);

                    if ($activity->updated_at) {
                        $url->setLastModificationDate($activity->updated_at);
                    }

                    $sitemap->add($url);
                    $activityCount++;
                });
        }
        $this->line("- Aktivitas publik ditambahkan ({$activityCount} aktivitas).");

        // 5. Simpan sitemap ke folder public yang relevan
        $targetPaths = [
            public_path('sitemap.xml'),
            base_path('../public_html/sitemap.xml'),
            '/home/u421808074/domains/iclo.co.id/public_html/sitemap.xml',
        ];

        $savedLocations = [];
        foreach (array_unique($targetPaths) as $path) {
            $dir = dirname($path);
            if (is_dir($dir)) {
                $sitemap->writeToFile($path);
                $savedLocations[] = $path;
            }
        }

        $this->info('Sitemap berhasil dibuat dan disimpan di:');
        foreach ($savedLocations as $loc) {
            $this->line(' -> ' . $loc);
        }

        $this->info('Catatan: Halaman admin (/admin/*) dan login (/login) secara otomatis tidak dimasukkan.');
    }
}