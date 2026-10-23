<?php

namespace App\Filament\Resources\ReagenteQuimicoResource\Pages;

use App\Filament\Resources\ReagenteQuimicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReagenteQuimico extends EditRecord
{
    protected static string $resource = ReagenteQuimicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}