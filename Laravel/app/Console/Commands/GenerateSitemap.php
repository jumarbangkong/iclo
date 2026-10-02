<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml otomatis untuk hosting Hostinger';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Halaman statis
        $sitemap->add(Url::create(config('app.url'))->setPriority(1.0));

        // Data dinamis dari database
        if (class_exists(Post::class)) {
            Post::all()->each(function (Post $post) use ($sitemap) {
                $sitemap->add(
                    Url::create(config('app.url') . "/blog/{$post->slug}")
                        ->setLastModificationDate($post->updated_at)
                        ->setPriority(0.8)
                );
            });
        }

        // Simpan langsung ke folder public_html domain iclo.co.id
        $sitemap->writeToFile('/home/u421808074/domains/iclo.co.id/public_html/sitemap.xml');

        $this->info('Sitemap berhasil dibuat di public_html!');
    }
}