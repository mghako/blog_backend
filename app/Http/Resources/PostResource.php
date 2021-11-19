<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'thumbnail' => $this->thumbnail,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'published_at' => $this->published_at->toDateString(),
            'category' => $this->category->name,
        ];
    }
}
