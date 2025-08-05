<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;


class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->visible(fn() => Auth::user()?->role === 'karyawan'),
        ];
    }
    public function getHeading(): string
    {
        return 'Daftar Pemasukan';
    }
    public function getBreadcrumb(): string
    {
        return 'Daftar';
    }
}
