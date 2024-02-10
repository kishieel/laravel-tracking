<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementResource;
use App\Services\AdvertisementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

use function response;

class AdvertisementController extends Controller
{
    public function __construct(private readonly AdvertisementService $service)
    {
    }

    public function random(): JsonResponse
    {
        $advertisement = $this->service->getRandom();
        return AdvertisementResource::make($advertisement)->response();
    }
}
