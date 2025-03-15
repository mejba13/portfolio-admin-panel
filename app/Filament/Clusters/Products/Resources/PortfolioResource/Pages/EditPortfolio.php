<?php

namespace App\Filament\Clusters\Products\Resources\PortfolioResource\Pages;

use App\Filament\Clusters\Products\Resources\PortfolioResource;
use Filament\Resources\Pages\Page;

class EditPortfolio extends Page
{
    protected static string $resource = PortfolioResource::class;

    protected static string $view = 'filament.clusters.products.resources.portfolio-resource.pages.edit-portfolio';
}
