<?php

namespace App\Filament\Resources\StyleRambutResource\Pages;

use App\Filament\Resources\StyleRambutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStyleRambut extends EditRecord
{
    protected static string $resource = StyleRambutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
