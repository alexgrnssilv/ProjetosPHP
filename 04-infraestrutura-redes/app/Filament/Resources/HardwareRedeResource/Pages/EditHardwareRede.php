<?php

namespace App\Filament\Resources\HardwareRedeResource\Pages;

use App\Filament\Resources\HardwareRedeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHardwareRede extends EditRecord
{
    protected static string $resource = HardwareRedeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}