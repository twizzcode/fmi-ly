<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Resources\Pages\ListRecords;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('markAllAsRead')
                ->label('Tandai Semua Dibaca')
                ->color('gray')
                ->icon('heroicon-m-check-badge')
                ->action(function () {
                
                    \App\Models\Contact::where('is_read', false)->update(['is_read' => true]);
                    
                    
                    \Filament\Notifications\Notification::make()
                        ->title('Semua pesan ditandai dibaca')
                        ->success()
                        ->send();

                    return redirect(static::getResource()::getUrl('index'));
                }),
        ];
    }
}