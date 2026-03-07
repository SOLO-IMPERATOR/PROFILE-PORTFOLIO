<?php

namespace App\Filament\Resources\AbillityResource\Pages;

use App\Filament\Resources\AbillityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbillity extends EditRecord
{
    protected static string $resource = AbillityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
