<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    // Redirect ke halaman index setelah berhasil create
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getHeading(): string
    {
        return 'Tambah Karyawan';
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
