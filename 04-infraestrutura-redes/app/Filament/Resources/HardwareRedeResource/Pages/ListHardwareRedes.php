<?php

namespace App\Filament\Resources\HardwareRedeResource\Pages;

use App\Filament\Resources\HardwareRedeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHardwareRedes extends ListRecords
{
    protected static string $resource = HardwareRedeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}