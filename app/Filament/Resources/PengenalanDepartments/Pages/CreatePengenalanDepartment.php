<?php

namespace App\Filament\Resources\PengenalanDepartments\Pages;

use App\Filament\Resources\PengenalanDepartments\PengenalanDepartmentResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePengenalanDepartment extends CreateRecord
{
    protected static string $resource = PengenalanDepartmentResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
}