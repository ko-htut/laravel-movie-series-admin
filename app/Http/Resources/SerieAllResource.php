<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SerieAllResource extends JsonResource
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
            'slug' => $this->slug,
            'poster_url' => 'http://movie.test' . $this->getFirstMediaUrl('SerialePoster'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
