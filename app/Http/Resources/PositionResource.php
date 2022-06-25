<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
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
            'nama_jabatan' => $this->nama_jabatan,
            'jumlah_maksimum' => $this->jumlah_maksimum,
            'event' => EventResource::collection($this->whenLoaded('events')),
        ];
    }
}
