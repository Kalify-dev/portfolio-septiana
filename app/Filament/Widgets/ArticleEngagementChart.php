<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\ChartWidget;

class ArticleEngagementChart extends ChartWidget
{
    protected static ?string $heading = 'Interaksi Pembaca / Artikel';
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 2;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Klik Artikel',
                    'data' => [120, 300, 450, 280, 600, 750, 900, 850, 1100, 1400, 1200, 1600],
                    'backgroundColor' => '#B38F55',
                    'borderColor' => 'transparent',
                    'borderRadius' => 6,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
