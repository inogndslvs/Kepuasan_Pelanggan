<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Survey;

class SatisfactionChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Kepuasan Pelanggan';

    protected function getData(): array
    {
        $puas = Survey::where('prediksi_kepuasan', 'Puas')->count();
        $tidakPuas = Survey::where('prediksi_kepuasan', 'Tidak Puas')->count();

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

    protected function getType(): string
    {
        return 'bar'; // bisa juga 'bar', 'line', dll.
    }
}
