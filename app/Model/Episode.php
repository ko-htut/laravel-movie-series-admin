<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Episode extends Model
{
    use HasSlug;

    protected $fillable = ['title', 'slug'];

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
}
