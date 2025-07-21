<?php

namespace App\Filament\Resources\HargaResource\Pages;

use App\Filament\Resources\HargaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHarga extends EditRecord
{
    protected static string $resource = HargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
