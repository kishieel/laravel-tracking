<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

Artisan::command('make:pixel {--uuid}', function () {
    $image = imagecreatetruecolor(1, 1);
    $color = imagecolorallocate($image, 255, 255, 255);
    imagesetpixel($image, 0, 0, $color);

    $uuid = $this->option('uuid') ?: Str::uuid();
    $path = '/pixels/' . $uuid . '.png';

    ob_start();
    imagepng($image);
    $content = ob_get_clean();

    Storage::disk('public')->put($path, $content);
    imagedestroy($image);

    $this->info('Pixel created.');
});
