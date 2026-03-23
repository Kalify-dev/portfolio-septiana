<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Buku;
use App\Models\Quote;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 1;

    protected function getColumns(): int
    {
        return 1;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Artikel', Article::count())
                ->description('Artikel diterbitkan')
                ->descriptionIcon('heroicon-m-newspaper')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),
            Stat::make('Koleksi Buku', Buku::count())
                ->description('Karya & Sastra')
                ->descriptionIcon('heroicon-m-book-open')
                ->chart([15, 4, 10, 2, 12, 4, 14])
                ->color('primary'),
            Stat::make('Quote Aktif', Quote::where('is_active', true)->count())
                ->description('Inspirasi Harian')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->chart([5, 8, 3, 10, 5, 12, 8])
                ->color('primary'),
        ];
    }
}
