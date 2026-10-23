<?php

namespace App\Filament\Resources\ConteinerResource\Pages;

use App\Filament\Resources\ConteinerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConteineres extends ListRecords
{
    protected static string $resource = ConteinerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}