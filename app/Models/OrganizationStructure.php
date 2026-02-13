<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OrganizationStructure extends Model
{

    protected $fillable = [
        'department_name', 
        'members'
    ];

    
    protected $casts = [
        'members' => 'array',
    ];

    protected array $previousMemberPhotos = [];

    protected static function booted(): void
    {
        static::updating(function (self $structure): void {
            if ($structure->isDirty('members')) {
                $structure->previousMemberPhotos = $structure->extractMemberPhotos($structure->getOriginal('members'));
            }
        });

        static::updated(function (self $structure): void {
            if (empty($structure->previousMemberPhotos)) {
                return;
            }

            $currentPhotos = $structure->extractMemberPhotos($structure->members);
            $deletedPhotos = array_diff($structure->previousMemberPhotos, $currentPhotos);

            foreach ($deletedPhotos as $photoPath) {
                Storage::disk('s3')->delete($photoPath);
            }

            $structure->previousMemberPhotos = [];
        });

        static::deleted(function (self $structure): void {
            foreach ($structure->extractMemberPhotos($structure->members) as $photoPath) {
                Storage::disk('s3')->delete($photoPath);
            }
        });
    }

    private function extractMemberPhotos(mixed $members): array
    {
        if (is_string($members)) {
            $members = json_decode($members, true);
        }

        if (!is_array($members)) {
            return [];
        }

        $photos = [];

        foreach ($members as $member) {
            if (is_array($member) && !empty($member['photo']) && is_string($member['photo'])) {
                $photos[] = $member['photo'];
            }
        }

        return array_values(array_unique($photos));
    }
}
