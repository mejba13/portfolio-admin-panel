<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\PortfolioResource\Pages;
use App\Models\Website\Portfolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PortfolioResource extends Resource
{
    use Translatable;

    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Website';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Portfolio Details')->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                    Forms\Components\TextInput::make('slug')
                        ->disabled()
                        ->dehydrated()
                        ->required()
                        ->maxLength(255)
                        ->unique(Portfolio::class, 'slug', ignoreRecord: true),

                    Forms\Components\MarkdownEditor::make('description')
                        ->required()
                        ->columnSpan('full'),

                    Forms\Components\ColorPicker::make('color')
                        ->required()
                        ->hex(),

                    Forms\Components\TextInput::make('url')
                        ->label('Project URL')
                        ->url()
                        ->maxLength(255),

                    Forms\Components\DatePicker::make('published_at')
                        ->label('Published Date'),
                ])->columns(2),

//                Forms\Components\FileUpload::make('image')
//                    ->image()
//                    ->disk('s3') // Store in S3
//                    ->directory('portfolio-images') // Folder in S3
//                    ->visibility('public') // Ensure it's publicly accessible
//                    ->required()
//                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('portfolio-images')
                    ->required()
                    ->columnSpanFull(),

            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('description')->markdown(),
                TextEntry::make('color'),
                TextEntry::make('url')
                    ->url(fn ($record) => $record->url), // Fixed by providing the correct argument
                ImageEntry::make('image'),
                TextEntry::make('published_at')->date(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->height('60px'),
                Tables\Columns\TextColumn::make('title')
                    ->limit(30)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('url')
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published Date')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('published_from'),
                        Forms\Components\DatePicker::make('published_until'),
                    ])
                    ->query(function ($query, $data) {
                        return $query
                            ->when($data['published_from'] ?? null, fn ($query, $date) => $query->whereDate('published_at', '>=', $date))
                            ->when($data['published_until'] ?? null, fn ($query, $date) => $query->whereDate('published_at', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function () {
                        Notification::make()
                            ->title('Now, now, don\'t be cheeky, leave some records for others to play with!')
                            ->warning()
                            ->send();
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolio::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'view' => Pages\ViewPortfolio::route('/{record}'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
