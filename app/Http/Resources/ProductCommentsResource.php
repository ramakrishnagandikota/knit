<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'rating' => $this->rating,
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
