<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieAllResource extends JsonResource
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
            'slug' => $this->slug,
            'genres' => GenreAllResource::collection($this->genres),
            'poster_url' => 'http://movie.test' . $this->getFirstMediaUrl('poster')
        ];
    }
}
