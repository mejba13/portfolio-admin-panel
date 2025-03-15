<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\PagesResource\Pages;
use App\Models\Website\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PagesResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $slug = 'website/pages';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\RichEditor::make('content')
                ->required()
                ->columnSpanFull(),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('slug')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
        ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePages::route('/'),
            'footer-settings' => Pages\FooterSettings::route('/footer-settings'),
            'navigation-menus' => Pages\NavigationMenus::route('/navigation-menus'),
        ];
    }
}
