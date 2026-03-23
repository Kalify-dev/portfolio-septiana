<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $modelLabel = 'Komentar';
    protected static ?string $pluralModelLabel = 'Komentar Pembaca';
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationGroup = 'Tulisan & Inspirasi';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('article_id')
                    ->label('Tulisan Terkait')
                    ->relationship('article', 'judul')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Pembaca')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('Alamat Email')
                    ->email(),
                Forms\Components\Textarea::make('isi_komentar')
                    ->label('Pesan & Kesan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_approved')
                    ->label('Terima Komentar (Tampil di Web)')
                    ->onColor('success')
                    ->offColor('danger')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('article.judul')
                    ->label('Komentar Pada Tulisan')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->limit(40),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Pengirim')
                    ->searchable()
                    ->description(fn (Comment $record): string => $record->email ?: '-'),
                Tables\Columns\TextColumn::make('isi_komentar')
                    ->label('Isi Pesan')
                    ->limit(50)
                    ->wrap(),
                Tables\Columns\ToggleColumn::make('is_approved')
                    ->label('Tampilkan')
                    ->onColor('success')
                    ->offColor('gray'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Terkirim Pada')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->color('gray'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_approved')
                    ->label('Status Validasi')
                    ->trueLabel('Hanya yang Diterima')
                    ->falseLabel('Perlu Validasi (Tertunda)')
                    ->placeholder('Semua Komentar'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->striped();
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
