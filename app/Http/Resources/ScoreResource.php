<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScoreResource extends JsonResource
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
          'user_id' => $this->user_id,
          'publication_id' => $this->book_id,
          'score' => $this->score,
          'created_at' => (string) $this->created_at,
          'updated_at' => (string) $this->updated_at,
          'publication' => $this->publication,
        ];
    }
}
