<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'description',
        'description_en',
        'image',
        'linkedin_url',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function images()
    {
        return $this->hasMany(ActivityImage::class);
    }

    public function getTitleAttribute($value)
    {
        if (app()->getLocale() !== 'id' && !empty($this->attributes['title_en']) && !request()->is('admin*')) {
            return $this->attributes['title_en'];
        }
        return $value;
    }

    public function getDescriptionAttribute($value)
    {
        if (app()->getLocale() !== 'id' && !empty($this->attributes['description_en']) && !request()->is('admin*')) {
            return $this->attributes['description_en'];
        }
        return $value;
    }
}
