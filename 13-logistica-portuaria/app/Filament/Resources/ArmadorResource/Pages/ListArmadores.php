<?php

namespace App\Filament\Resources\ArmadorResource\Pages;

use App\Filament\Resources\ArmadorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArmadores extends ListRecords
{
    protected static string $resource = ArmadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}