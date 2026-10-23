<?php

namespace App\Filament\Resources\BebeResource\Pages;

use App\Filament\Resources\BebeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBebes extends ListRecords
{
    protected static string $resource = BebeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}