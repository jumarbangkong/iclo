<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'email', 'bio', 'avatar'])]
class Author extends Model
{
    use HasFactory;

    /**
     * Get the articles written by this author.
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
