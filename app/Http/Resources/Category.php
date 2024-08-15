<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'lang' => $this->lang,
            'ten' => $this->ten,
            'thuTu' => $this->thuTu,
            'url' => $this->url,
            'created_at' => $this->created_at->format('d/m/Y'),
        ];
    }
}
