<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PengenalanDepartment extends Model
{
    protected $fillable = ['name', 'description', 'image'];

    protected ?string $oldImagePath = null;

    protected static function booted(): void
    {
        static::updating(function (self $department): void {
            if ($department->isDirty('image')) {
                $department->oldImagePath = $department->getOriginal('image');
            }
        });

        static::updated(function (self $department): void {
            if (!$department->oldImagePath) {
                return;
            }

            if ($department->oldImagePath !== $department->image) {
                Storage::disk('s3')->delete($department->oldImagePath);
            }

            $department->oldImagePath = null;
        });

        static::deleted(function (self $department): void {
            if ($department->image) {
                Storage::disk('s3')->delete($department->image);
            }
        });
    }
}
