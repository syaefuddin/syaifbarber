<?php

namespace App\Filament\Resources\HargaResource\Pages;

use App\Filament\Resources\HargaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHarga extends CreateRecord
{
    protected static string $resource = HargaResource::class;

    // Redirect ke halaman index setelah berhasil create
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getHeading(): string
    {
        return 'Tambah Harga Pelayanan';
    }

    public function getBreadcrumb(): string
    {
        return 'Tambah';
    }

    protected function getCreateAnotherFormAction(): Actions\Action
    {
        return Actions\Action::make('createAnother')
            ->label('Buat lainnya')
            ->action('createAnother')
            ->color('gray')
            ->visible(false);
    }
}
