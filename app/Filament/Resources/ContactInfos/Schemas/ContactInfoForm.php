<?php

namespace App\Filament\Resources\ContactInfos\Schemas;

use Filament\Schemas\Schema;

class ContactInfoForm
{
    public static function configure(Schema $schema): Schema {
    return $schema->components([
        \Filament\Forms\Components\TextInput::make('type')->required(),
        \Filament\Forms\Components\TextInput::make('icon')->required()->helperText('Contoh: heroicon-o-envelope'),
        \Filament\Forms\Components\Textarea::make('value')->required(),
    ]);
}
}