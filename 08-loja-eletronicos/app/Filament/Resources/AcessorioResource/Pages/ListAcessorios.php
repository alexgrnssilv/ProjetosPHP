<?php

namespace App\Filament\Resources\AcessorioResource\Pages;

use App\Filament\Resources\AcessorioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcessorios extends ListRecords
{
    protected static string $resource = AcessorioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}