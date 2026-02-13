<?php

namespace App\Filament\Resources\LinkServices\Pages;

use App\Filament\Resources\LinkServices\LinkServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLinkServices extends ListRecords
{
    protected static string $resource = LinkServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
