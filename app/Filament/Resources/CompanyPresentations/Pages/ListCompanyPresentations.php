<?php

namespace App\Filament\Resources\CompanyPresentations\Pages;

use App\Filament\Resources\CompanyPresentations\CompanyPresentationResource;
use Filament\Resources\Pages\ListRecords;

class ListCompanyPresentations extends ListRecords
{
    protected static string $resource = CompanyPresentationResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
