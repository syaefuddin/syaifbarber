<?php

namespace App\Filament\Resources\StyleRambutResource\Pages;

use App\Filament\Resources\StyleRambutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStyleRambuts extends ListRecords
{
    protected static string $resource = StyleRambutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
