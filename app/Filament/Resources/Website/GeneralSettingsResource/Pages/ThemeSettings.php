<?php

namespace App\Filament\Resources\Website\GeneralSettingsResource\Pages;

use App\Filament\Resources\Website\GeneralSettingsResource;
use Filament\Resources\Pages\EditRecord;

class ThemeSettings extends EditRecord
{
    protected static string $resource = GeneralSettingsResource::class;

    protected static ?string $title = 'Theme Settings';

    protected function getActions(): array
    {
        return [
            //
        ];
    }
}
