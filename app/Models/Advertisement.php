<?php

namespace App\Models;

use Database\Factories\AdvertisementFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @extends Model<Advertisement>
 * @property int $id
 * @property string $image_path
 * @property string $image_url
 * @property string $pixel_uuid
 * @property string $click_uuid
 * @property string $redirect_url
 * @property int $views
 * @property int $clicks
 * @method static AdvertisementFactory factory($count = null, $state = [])
 */
class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'pixel_uuid',
        'click_uuid',
        'redirect_url',
    ];

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->image_path);
    }
}
