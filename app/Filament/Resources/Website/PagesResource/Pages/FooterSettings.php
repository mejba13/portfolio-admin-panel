<?php

namespace App\Filament\Resources\Website\PagesResource\Pages;

use App\Filament\Resources\Website\PagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class FooterSettings extends EditRecord
{
    protected static string $resource = PagesResource::class;

    protected static ?string $title = 'Footer Settings';

    protected static ?string $navigationLabel = 'Footer Settings';

    protected static string $view = 'filament.resources.pages-resource.pages.footer-settings';

    protected function getHeaderActions(): array
    {
        return [
            Actions\SaveAction::make(),
        ];
    }

    public function getRecord(): \Illuminate\Database\Eloquent\Model
    {
        // Adjust the ID or retrieval logic according to your setup
        return static::getModel()::firstOrCreate(['slug' => 'footer-settings'], [
            'title' => 'Footer Settings',
            'content' => '',
        ]);
    }
}
