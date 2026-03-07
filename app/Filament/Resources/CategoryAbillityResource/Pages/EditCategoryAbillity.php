<?php

namespace App\Filament\Resources\CategoryAbillityResource\Pages;

use App\Filament\Resources\CategoryAbillityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryAbillity extends EditRecord
{
    protected static string $resource = CategoryAbillityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
