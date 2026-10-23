<?php

namespace App\Filament\Resources\GenitoraResource\Pages;

use App\Filament\Resources\GenitoraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGenitoras extends ListRecords
{
    protected static string $resource = GenitoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}