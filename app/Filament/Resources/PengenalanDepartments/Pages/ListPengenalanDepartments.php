<?php

namespace App\Filament\Resources\PengenalanDepartments\Pages;

use App\Filament\Resources\PengenalanDepartments\PengenalanDepartmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengenalanDepartments extends ListRecords
{
    protected static string $resource = PengenalanDepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}