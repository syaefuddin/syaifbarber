<?php

namespace App\Filament\Resources\SemirResource\Pages;

use App\Filament\Resources\SemirResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSemir extends EditRecord
{
    protected static string $resource = SemirResource::class;

    // Redirect ke halaman index setelah berhasil create
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
