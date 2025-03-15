<?php

namespace App\Filament\Resources\Website;

use App\Filament\Resources\Website\GeneralSettingsResource\Pages;
use App\Models\Website\GeneralSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GeneralSettingsResource extends Resource
{
    protected static ?string $model = GeneralSetting::class;

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'General Settings';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site Information')
                    ->schema([
                        Forms\Components\TextInput::make('site_title')
                            ->label('Site Title')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('site_tagline')
                            ->label('Site Tagline')
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('site_logo')
                            ->label('Site Logo')
                            ->image()
                            ->directory('logos'),

                        Forms\Components\FileUpload::make('site_favicon')
                            ->label('Site Favicon')
                            ->image()
                            ->directory('favicons'),

                        Forms\Components\TextInput::make('contact_email')
                            ->label('Contact Email')
                            ->email(),

                        Forms\Components\TextInput::make('contact_number')
                            ->label('Contact Number'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('site_logo')->label('Logo'),
                Tables\Columns\TextColumn::make('site_title')->label('Title')->sortable(),
                Tables\Columns\TextColumn::make('site_tagline')->label('Tagline')->sortable(),
                Tables\Columns\TextColumn::make('contact_email')->label('Email'),
                Tables\Columns\TextColumn::make('contact_number')->label('Contact Number'),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated At')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGeneralSettings::route('/'),
            'site-configuration' => Pages\SiteConfiguration::route('/site-configuration'),
            'email-configuration' => Pages\EmailConfiguration::route('/email-configuration'),
            'theme-settings' => Pages\ThemeSettings::route('/theme-settings'),
        ];
    }
}
