<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['author_id', 'title', 'title_en', 'slug', 'category_id', 'content', 'content_en', 'excerpt', 'excerpt_en', 'cover_image', 'published_at', 'status'])]
class Article extends Model
{
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    /**
     * Get the author of this article.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the category of this article.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getTitleAttribute($value)
    {
        if (app()->getLocale() !== 'id' && !empty($this->attributes['title_en']) && !request()->is('admin*')) {
            return $this->attributes['title_en'];
        }
        return $value;
    }

    public function getExcerptAttribute($value)
    {
        if (app()->getLocale() !== 'id' && !empty($this->attributes['excerpt_en']) && !request()->is('admin*')) {
            return $this->attributes['excerpt_en'];
        }
        return $value;
    }

    public function getContentAttribute($value)
    {
        if (app()->getLocale() !== 'id' && !empty($this->attributes['content_en']) && !request()->is('admin*')) {
            return $this->attributes['content_en'];
        }
        return $value;
    }

    /**
     * Helper to compute estimated reading time.
     */
    public function getReadingTimeAttribute(): int
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200); // average 200 words per minute
        return max(1, $minutes);
    }

    /**
     * Helper to get a beautiful formatted publish date.
     */
    public function getFormattedDateAttribute(): string
    {
        if (!$this->published_at) {
            return '-';
        }
        
        $monthsId = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        $locale = app()->getLocale();
        if ($locale === 'id') {
            return $this->published_at->format('j') . ' ' . $monthsId[$this->published_at->format('n')] . ' ' . $this->published_at->format('Y');
        }

        return $this->published_at->format('M j, Y');
    }
}
