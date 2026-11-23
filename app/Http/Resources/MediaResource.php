<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'episode_count' => $this->episode_count,
            'rating' => $this->rating,
            'users' => UserResource::collection($this->whenLoaded('users')),
        ];
    }
}
