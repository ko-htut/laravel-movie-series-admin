<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeasonResource extends JsonResource
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
            'id' => $this->id,
            'sezone_nr' => $this->sezone_nr,
            'episodes' => EpisodeAllResource::collection($this->episodes),
            'poster_url' => 'http://movie.test' . $this->getFirstMediaUrl('SezonePoster')
        ];
    }
}
