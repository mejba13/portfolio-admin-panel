<?php

namespace App\Filament\Resources\Website\PagesResource\Pages;

use App\Filament\Resources\Website\PagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class NavigationMenus extends ListRecords
{
    protected static string $resource = PagesResource::class;

    protected static ?string $title = 'Navigation Menus';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
