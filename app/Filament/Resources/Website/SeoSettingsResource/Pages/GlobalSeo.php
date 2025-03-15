<?php

namespace App\Filament\Resources\Website\SeoSettingsResource\Pages;

use App\Filament\Resources\Website\SeoSettingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class GlobalSeo extends ListRecords
{
    protected static string $resource = SeoSettingsResource::class;

    protected static ?string $title = 'Global SEO Settings';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
