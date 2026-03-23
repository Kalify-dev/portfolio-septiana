<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestArticlesWidget extends BaseWidget
{
    protected static ?string $heading = 'Catatan & Inspirasi Terakhir';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Article::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Cover')
                    ->circular()
                    ->disk('public')
                    ->size(40)
                    ->defaultImageUrl('https://ui-avatars.com/api/?name=A&background=C9A96E&color=fff'),
                
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Tulisan')
                    ->weight('bold')
                    ->sortable()
                    ->description(fn (Article $record): string => \Illuminate\Support\Str::limit(strip_tags($record->excerpt ?? $record->konten), 60)),
                
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-minus-circle')
                    ->trueColor('success')
                    ->falseColor('warning'),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Terbit Pada')
                    ->dateTime('d M Y')
                    ->color('gray')
                    ->sortable(),
            ])
            ->paginated(false)
            ->striped();
    }
}
