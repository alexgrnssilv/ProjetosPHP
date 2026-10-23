<?php

namespace App\Filament\Resources\RemetenteResource\Pages;

use App\Filament\Resources\RemetenteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRemetente extends EditRecord
{
    protected static string $resource = RemetenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}