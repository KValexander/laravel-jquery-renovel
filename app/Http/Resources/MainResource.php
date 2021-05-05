<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Возвращаем данные новелл 
        return[
            'novel_id' => $this->novel->novel_id,
            'user_id' => $this->novel->user_id,
            'developer' => $this->developer->title,
            'publisher' => $this->publisher->title,
            'title' => $this->novel->title,
            'original_title' => $this->novel->original_title,
            'alternative_title' => $this->novel->alternative_title,
            'year_release' => $this->novel->year_release,
            'description' => $this->novel->description,
            'age_rating' => $this->novel->age_rating,
            'genres' => $this->genres,
            'tags' => $this->tags,
            'type' => $this->type->type,
            'duration' => $this->duration->duration,
            'platform' => $this->platform->platform,
            'country' => $this->country->country,
            'language' => $this->language->language,
        ];
    }
}
