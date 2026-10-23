<?php

namespace App\Filament\Resources\RemetenteResource\Pages;

use App\Filament\Resources\RemetenteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRemetentes extends ListRecords
{
    protected static string $resource = RemetenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}