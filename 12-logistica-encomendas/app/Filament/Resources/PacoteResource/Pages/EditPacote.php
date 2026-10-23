<?php

namespace App\Filament\Resources\PacoteResource\Pages;

use App\Filament\Resources\PacoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPacote extends EditRecord
{
    protected static string $resource = PacoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}