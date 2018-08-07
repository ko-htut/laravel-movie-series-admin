<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Genre extends Model
{
    use HasSlug;
    protected $fillable = [
        'genre_type',
        'genre_description',
    ];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('genre_type')
            ->saveSlugsTo('slug');
    }
    public function movies()
    {
        return $this->belongsToMany(Movie::class)->latest();
    }
    public function setGenreTypeAttribute($value)
    {
        $this->attributes['genre_type'] = ucfirst($value);
    }
}
