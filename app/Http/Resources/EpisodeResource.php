<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
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
            'season' => $this->season,
            'embeds' => $this->embeds,
            'shikolinks' => $this->shikolinks,
            'shkarkolinks' => $this->shkarkolinks,
            'trailerlinks' => $this->trailerlinks
        ];
    }
}
