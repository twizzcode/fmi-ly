<?php

namespace App\Filament\Resources\LinkServices\Pages;

use App\Filament\Resources\LinkServices\LinkServiceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLinkService extends CreateRecord
{
    protected static string $resource = LinkServiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}