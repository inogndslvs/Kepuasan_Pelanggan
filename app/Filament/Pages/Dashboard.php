<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\SatisfactionChart;
use App\Filament\Widgets\TotalCustomer;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pelanggan',
                    'data' => [$puas, $tidakPuas],
                    'backgroundColor' => ['#4ade80', '#f87171'], // hijau dan merah
                ],
            ],
            'labels' => ['Puas', 'Tidak Puas'],
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            SatisfactionChart::class, // untuk chart grafik
        ];
    }
}
