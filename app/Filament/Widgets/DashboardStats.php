<?php

namespace App\Filament\Widgets;

use App\Models\Survey;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DashboardStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Survey', Survey::count()),
            Card::make('Pelanggan Puas', Survey::where('prediksi_kepuasan', 'Puas')->count()),
            Card::make('Pelanggan Tidak Puas', Survey::where('prediksi_kepuasan', 'Tidak Puas')->count()),
        ];
    }
}
