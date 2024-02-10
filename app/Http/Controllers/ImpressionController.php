<?php

namespace App\Http\Controllers;

use App\Services\AdvertisementService;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\StreamedResponse;

use function route;

class ImpressionController extends Controller
{
    public function __construct(private readonly AdvertisementService $service)
    {
    }

    public function pixel(string $uuid): StreamedResponse
    {
        $advertisement = $this->service->findByPixelUuid($uuid);
        $advertisement->increment('views');

        return Storage::download("/public/pixels/{$uuid}.png");
    }

    public function click(string $uuid): RedirectResponse
    {
        $advertisement = $this->service->findByClickUuid($uuid);
        $advertisement->increment('clicks');

        return redirect($advertisement->redirect_url);
    }
}
