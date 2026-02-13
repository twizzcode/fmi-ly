<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContactStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pesan Masuk', Contact::count())
                ->description('Total pesan dari pengunjung')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('success'),
            
            // Kamu juga bisa tambah statistik galeri di sini
            Stat::make('Total Koleksi Foto', \App\Models\Gallery::count())
                ->descriptionIcon('heroicon-m-photo')
                ->color('info'),
        ];
    }
}