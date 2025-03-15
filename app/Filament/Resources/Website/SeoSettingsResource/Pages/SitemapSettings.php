<?php

namespace App\Filament\Resources\Website\SeoSettingsResource\Pages;

use App\Filament\Resources\Website\SeoSettingsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class SitemapSettings extends EditRecord
{
    protected static string $resource = SeoSettingsResource::class;

    protected static ?string $title = 'Sitemap Settings';

    protected function getHeaderActions(): array
    {
        return [
            Actions\SaveAction::make(),
        ];
    }

    public function getRecord(): \Illuminate\Database\Eloquent\Model
    {
        return static::getModel()::firstOrCreate(
            ['slug' => 'sitemap-settings'],
            ['name' => 'Sitemap Settings', 'description' => 'Configure sitemap options', 'is_visible' => true]
        );
    }
}
