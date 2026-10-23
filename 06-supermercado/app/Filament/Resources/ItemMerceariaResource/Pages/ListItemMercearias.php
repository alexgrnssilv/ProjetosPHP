<?php

namespace App\Filament\Resources\ItemMerceariaResource\Pages;

use App\Filament\Resources\ItemMerceariaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItemMercearias extends ListRecords
{
    protected static string $resource = ItemMerceariaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}