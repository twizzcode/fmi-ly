<?php

namespace App\Filament\Resources\LinkServices;

use App\Filament\Resources\LinkServices\Pages\CreateLinkService;
use App\Filament\Resources\LinkServices\Pages\EditLinkService;
use App\Filament\Resources\LinkServices\Pages\ListLinkServices;
use App\Filament\Resources\LinkServices\Schemas\LinkServiceForm;
use App\Filament\Resources\LinkServices\Tables\LinkServicesTable;
use App\Models\LinkService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;

class LinkServiceResource extends Resource
{
    protected static ?string $model = LinkService::class;

    protected static bool $shouldSkipAuthorization = true;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-link';

    public static function form(Schema $schema): Schema
    {
        return LinkServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LinkServicesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLinkServices::route('/'),
            'create' => CreateLinkService::route('/create'),
            'edit' => EditLinkService::route('/{record}/edit'),
        ];
    }
}