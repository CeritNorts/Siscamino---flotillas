<?php

namespace App\Filament\Resources\CombustibleResource\Pages;

use App\Filament\Resources\CombustibleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCombustibles extends ListRecords
{
    protected static string $resource = CombustibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
