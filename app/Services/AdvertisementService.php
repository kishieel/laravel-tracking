<?php

namespace App\Services;

use App\Models\Advertisement;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class AdvertisementService
{
    static public function create(string $redirectUrl, string $imagePath): Advertisement
    {
        Artisan::call('make:pixel', ['--uuid' => $pixelUuid = Str::uuid()]);
        $clickUuid = Str::uuid();

        /** @var Advertisement */
        return Advertisement::query()->create([
            'image_path' => $imagePath,
            'redirect_url' => $redirectUrl,
            'click_uuid' => $clickUuid,
            'pixel_uuid' => $pixelUuid,
        ]);
    }

    public function findByPixelUuid(string $uuid): Advertisement
    {
        /** @var Advertisement */
        return Advertisement::query()
            ->where('pixel_uuid', $uuid)
            ->firstOrFail();
    }

    public function findByClickUuid(string $uuid): Advertisement
    {
        /** @var Advertisement */
        return Advertisement::query()
            ->where('click_uuid', $uuid)
            ->firstOrFail();
    }

    public function getRandom(): Advertisement
    {
        /** @var Advertisement */
        return Advertisement::query()
            ->inRandomOrder()
            ->firstOrFail();
    }
}
