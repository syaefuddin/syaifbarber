<?php

namespace App\Filament\Resources\SemirResource\Pages;

use App\Filament\Resources\SemirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSemirs extends ListRecords
{
    protected static string $resource = SemirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
