<?php

namespace App\Filament\Resources\SemirResource\Pages;

use App\Filament\Resources\SemirResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSemir extends CreateRecord
{
    protected static string $resource = SemirResource::class;

    // Redirect ke halaman index setelah berhasil create
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getHeading(): string
    {
        return 'Tambah Semir Rambut';
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
