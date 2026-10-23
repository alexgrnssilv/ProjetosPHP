<?php

namespace App\Filament\Resources\BebeResource\Pages;

use App\Filament\Resources\BebeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBebe extends EditRecord
{
    protected static string $resource = BebeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}