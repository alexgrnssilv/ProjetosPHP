<?php

namespace App\Filament\Resources\ArmadorResource\Pages;

use App\Filament\Resources\ArmadorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArmador extends EditRecord
{
    protected static string $resource = ArmadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}