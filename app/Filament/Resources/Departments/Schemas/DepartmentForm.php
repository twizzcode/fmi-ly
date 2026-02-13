<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Departemen')
                    ->required()
                    ->placeholder('Contoh: Dept. PH'),

                FileUpload::make('image')
                    ->label('Foto Departemen')
                    ->image()
                    ->directory('departments')
                    ->required()
                    ->imageEditor(),
            ]);
    }
}