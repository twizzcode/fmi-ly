<?php

namespace App\Filament\Resources\PengenalanDepartments;

use App\Filament\Resources\PengenalanDepartments\Pages;
use App\Models\PengenalanDepartment;
use Filament\Resources\Resource;
use BackedEnum;

class PengenalanDepartmentResource extends Resource
{
    protected static ?string $model = PengenalanDepartment::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->label('Nama Departemen')
                    ->required(),
                
                \Filament\Forms\Components\FileUpload::make('image')
                    ->label('Foto')
                    ->directory('departments')
                    ->image()
                    ->required(),

                \Filament\Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Departemen')
                    ->rows(5)
                    ->required(),
            ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image')
                    ->label('Foto'),
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->label('Nama Departemen')
                    ->searchable()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(), 
                \Filament\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengenalanDepartments::route('/'),
            'create' => Pages\CreatePengenalanDepartment::route('/create'),
            'edit' => Pages\EditPengenalanDepartment::route('/{record}/edit'),
        ];
    }
}