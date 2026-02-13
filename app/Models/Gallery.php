<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'content',
        'description',
        'date_of_event',
    ];

    protected ?string $oldImagePath = null;

    protected static function booted(): void
    {
        static::updating(function (self $gallery): void {
            if ($gallery->isDirty('image')) {
                $gallery->oldImagePath = $gallery->getOriginal('image');
            }
        });

        static::updated(function (self $gallery): void {
            if (!$gallery->oldImagePath) {
                return;
            }

            if ($gallery->oldImagePath !== $gallery->image) {
                Storage::disk('s3')->delete($gallery->oldImagePath);
            }

            $gallery->oldImagePath = null;
        });

        static::deleted(function (self $gallery): void {
            if ($gallery->image) {
                Storage::disk('s3')->delete($gallery->image);
            }
        });
    }
}
