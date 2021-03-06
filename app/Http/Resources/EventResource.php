<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'nama_event' => $this->nama_event,
            'deskripsi_event' => $this->deskripsi_event,
            'slug' => $this->slug,
            'user' => $this->whenLoaded('user'),
            'alamat' => $this->alamat,
            'social_media' => $this->social_media
            // 'events' => EventResource::collection($this->events),
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
