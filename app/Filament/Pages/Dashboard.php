<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\WidgetConfiguration;
use App\Filament\Widgets\ArticleEngagementChart;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\VisitorChart;

class Dashboard extends BaseDashboard
{
    public function getColumns(): int | string | array
    {
        return [
            'default' => 1,
            'lg' => 3,
        ];
    }

    public function getWidgets(): array
    {
        return [
            ArticleEngagementChart::class,
            StatsOverview::class,
            VisitorChart::class,
            \App\Filament\Widgets\LatestArticlesWidget::class,
        ];
    }
}
