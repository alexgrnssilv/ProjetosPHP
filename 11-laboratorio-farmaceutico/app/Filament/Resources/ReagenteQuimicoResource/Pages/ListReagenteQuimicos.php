<?php

namespace App\Filament\Resources\ReagenteQuimicoResource\Pages;

use App\Filament\Resources\ReagenteQuimicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReagenteQuimicos extends ListRecords
{
    protected static string $resource = ReagenteQuimicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}