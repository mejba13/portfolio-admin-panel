<?php

namespace App\Filament\Resources\Website\GeneralSettingsResource\Pages;

use App\Filament\Resources\Website\GeneralSettingsResource;
use Filament\Resources\Pages\EditRecord;

class EmailConfiguration extends EditRecord
{
    protected static string $resource = GeneralSettingsResource::class;

    protected static ?string $title = 'Email Configuration';

    protected function getActions(): array
    {
        return [
            //
        ];
    }
}
