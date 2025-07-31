<?php

namespace App\Filament\Resources\StyleRambutResource\Pages;

use App\Filament\Resources\StyleRambutResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStyleRambut extends CreateRecord
{
    protected static string $resource = StyleRambutResource::class;

    // Redirect ke halaman index setelah berhasil create
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
