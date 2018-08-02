<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Movie extends Model implements HasMedia
{
    use HasSlug;
    use HasMediaTrait;
    protected $fillable = [
        'language_id',
        'title',
        'running_time',
        'release_date',
        'movie_description',
        'movie_review',
        'movie_actor'
    ];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function embeds()
    {
        return $this->morphMany(Embed::class, 'embedable');
    }
    public function shikolinks()
    {
        return $this->morphMany(Shikolink::class, 'shikolinkable');
    }
    public function shkarkolinks()
    {
        return $this->morphMany(Shkarkolink::class, 'shkarkolinkable');
    }
    public function trailerlinks()
    {
        return $this->morphMany(Trailerlink::class, 'trailerlinkable');
    }
    public function delete()
    {
        return parent::delete();
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class)
            ->withTimestamps();
    }
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('poster')
            ->singleFile();
    }
}
