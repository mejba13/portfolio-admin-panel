<?php

namespace App\Filament\Resources\Website\PagesResource\Pages;

use App\Filament\Resources\Website\PagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ManagePages extends ListRecords
{
    protected static string $resource = PagesResource::class;

    protected static ?string $title = 'Manage Pages';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
