<?php

namespace App\Http\Resources;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function url;

/** @mixin Advertisement */
class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'image_url' => $this->image_url,
            'pixel_url' => url()->route('impression.view', ['uuid' => $this->pixel_uuid]),
            'click_url' => url()->route('impression.click', ['uuid' => $this->click_uuid]),
        ];
    }
}
