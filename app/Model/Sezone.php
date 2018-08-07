<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Sezone extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['sezone_nr'];

    public function seriale()
    {
        return $this->belongsTo(Seriale::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class)->latest();
    }
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('SezonePoster')
            ->singleFile();
    }
}
