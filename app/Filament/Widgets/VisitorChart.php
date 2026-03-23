<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class VisitorChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Pengunjung (7 Hari Terakhir)';
    protected static ?string $pollingInterval = '30s';
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Pengunjung Unik',
                    'data' => [45, 120, 85, 160, 210, 190, 250],
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(201, 169, 110, 0.1)',
                    'borderColor' => '#C9A96E',
                    'tension' => 0.4,
                ],
            ],
            'labels' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
