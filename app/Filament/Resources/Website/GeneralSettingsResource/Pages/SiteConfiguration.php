<?php

namespace App\Filament\Resources\Website\GeneralSettingsResource\Pages;

use App\Filament\Resources\Website\GeneralSettingsResource;
use Filament\Resources\Pages\EditRecord;

class SiteConfiguration extends EditRecord
{
    protected static string $resource = GeneralSettingsResource::class;

    protected static ?string $title = 'Site Configuration';

    protected function getActions(): array
    {
        return [
            //
        ];
    }
}
