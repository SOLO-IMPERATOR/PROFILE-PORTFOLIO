<?php

namespace App\Filament\Resources\CategoryAbillityResource\Pages;

use App\Filament\Resources\CategoryAbillityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryAbillities extends ListRecords
{
    protected static string $resource = CategoryAbillityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
