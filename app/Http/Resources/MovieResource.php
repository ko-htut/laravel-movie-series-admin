<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'release_date' => $this->release_date,
            'runing_time' => $this->slug,
            'movie_description' => $this->movie_description,
            'slug' => $this->slug,
            'poster_url' => 'http://movie.test' . $this->getFirstMediaUrl('poster'),
            'embeds' => $this->embeds,
            'shikolinks' => $this->shikolinks,
            'shkarkolinks' => $this->shkarkolinks,
            'trailerlinks' => $this->trailerlinks
        ];
    }
}
