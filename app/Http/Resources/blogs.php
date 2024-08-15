<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class blogs extends JsonResource
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
            'tieuDe' => $this->tieuDe,
            'url' => $this->url,
            'urlhinhAnh' => $this->urlhinhAnh,
            'loaiTinId' => $this->loaiTinId,
            'nguoiDangId' => $this->nguoiDangId,
            'soLanXem' => $this->luotXem,
            'noiBat' => $this->luotXem,
            'anHien' => $this->luotXem,
            'created_at' => $this->created_at->format('Y-m-d')
        ];
    }
}
