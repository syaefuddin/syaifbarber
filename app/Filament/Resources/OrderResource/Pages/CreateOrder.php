<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Harga;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ambil ID pelayanan dari repeater
        $hargaIds = collect($data['detail_pelayanan'] ?? [])
            ->pluck('harga_id');

        // Hitung total harga dari DB berdasarkan harga_id
        $data['total_harga'] = Harga::whereIn('id', $hargaIds)->sum('harga');

        return $data;
    }

    protected function afterCreate(): void
    {
        // Simpan relasi order_detail
        $this->record->hargas()->sync(
            collect($this->data['detail_pelayanan'])->pluck('harga_id')
        );
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
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
