<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Seriale extends Model implements HasMedia
{
    use HasSlug, HasMediaTrait;

    protected $fillable = [
        'title',
        'created_year',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function sezones()
    {
        return $this->hasMany(Sezone::class)->latest();
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('SerialePoster')
            ->singleFile();
    }
}
