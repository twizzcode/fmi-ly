<?php

namespace App\Filament\Resources\PengenalanDepartments\Pages;

use App\Filament\Resources\PengenalanDepartments\PengenalanDepartmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengenalanDepartment extends EditRecord
{
    protected static string $resource = PengenalanDepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}