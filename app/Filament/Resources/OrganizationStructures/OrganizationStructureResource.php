<?php

namespace App\Filament\Resources\OrganizationStructures;

use App\Filament\Resources\OrganizationStructures\Pages;
use App\Models\OrganizationStructure;
use Filament\Resources\Resource;
use BackedEnum;

class OrganizationStructureResource extends Resource
{
    protected static ?string $model = OrganizationStructure::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'department_name';

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
{
    return $schema
        ->components([
            \Filament\Forms\Components\TextInput::make('department_name')
                ->label('Nama Departemen')
                ->placeholder('Contoh: Departemen Media dan Informasi')
                ->required(),

            \Filament\Forms\Components\Repeater::make('members')
                ->label('Daftar Anggota')
                ->schema([
                    \Filament\Forms\Components\FileUpload::make('photo')
                        ->label('Foto')
                        ->image()
                        ->directory('organization')
                        ->required()
                        ->columnSpanFull(),

                    \Filament\Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required(),

                    \Filament\Forms\Components\TextInput::make('position')
                        ->label('Posisi / Jabatan')
                        ->placeholder('Contoh: Ketua Departemen / Staff')
                        ->required(),

                    \Filament\Forms\Components\TextInput::make('prodi')
                        ->label('Program Studi')
                        ->placeholder('S1 Fisika'),
                        

                    \Filament\Forms\Components\TextInput::make('phone')
                        ->label('No. Telepon / WhatsApp')
                        ->tel()
                        ->placeholder('08123456789'),
                ])
                ->columns(2)
                ->addActionLabel('Tambah Anggota Baru')
                ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'Anggota Baru'),
        ]);
}

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
{
    return $table
        ->columns([
            \Filament\Tables\Columns\TextColumn::make('department_name')
                ->label('Nama Departemen')
                ->searchable(),

            \Filament\Tables\Columns\TextColumn::make('members')
                ->label('Jumlah Anggota')
                ->state(function ($record): int {
                    return count($record->members ?? []);
                })
                ->formatStateUsing(fn ($state): string => "{$state} Orang")
                ->badge()
                ->color('success'),
        ])
        ->actions([
            \Filament\Actions\EditAction::make(),
            \Filament\Actions\DeleteAction::make(),
        ]);
}
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizationStructures::route('/'),
            'create' => Pages\CreateOrganizationStructure::route('/create'),
            'edit' => Pages\EditOrganizationStructure::route('/{record}/edit'),
        ];
    }
}