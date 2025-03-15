<?php

namespace App\Filament\Resources\Website\GeneralSettingsResource\Pages;

use App\Filament\Resources\Website\GeneralSettingsResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ManageGeneralSettings extends ListRecords
{
    protected static string $resource = GeneralSettingsResource::class;

    protected static ?string $title = 'General Settings';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
