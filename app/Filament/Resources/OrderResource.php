<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Harga;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Model;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Hidden::make('karyawan_id')
                ->default(fn() => Auth::id()),

            TextInput::make('nama_pelanggan')
                ->required(),

            Repeater::make('detail_pelayanan')
                ->label('Jenis Pelayanan')
                ->schema([
                    Select::make('harga_id')
                        ->label('Pilih Pelayanan')
                        ->options(Harga::all()->pluck('pelayanan', 'id'))
                        ->reactive()
                        ->afterStateUpdated(function ($state, Set $set, Get $get) {
                            $harga = Harga::find($state)?->harga ?? 0;
                            $set('harga', $harga);

                            // Update total saat harga_id berubah
                            $total = collect($get('detail_pelayanan'))
                                ->pluck('harga')
                                ->sum();
                            $set('total_harga', $total);
                        }),

                    TextInput::make('harga')
                        ->disabled()
                        ->dehydrated(false), // tidak ikut disimpan
                ])
                ->columns(2)
                ->live()
                ->afterStateUpdated(function (Get $get, Set $set) {
                    // Update total saat repeater berubah (tambah/hapus baris)
                    $total = collect($get('detail_pelayanan'))
                        ->pluck('harga')
                        ->sum();
                    $set('total_harga', $total);
                }),

            TextInput::make('total_harga')
                ->label('Total Harga')
                ->disabled()
                ->numeric()
                ->default(0)
                ->dehydrated(), // ikut disimpan ke database
        ]);
    }


    public static function mutateFormDataBeforeFill(array $data): array
    {
        if (!isset($data['id'])) return $data; // Hindari error saat create

        $data['detail_pelayanan'] = Order::find($data['id'])?->hargas->map(function ($harga) {
            return [
                'harga_id' => $harga->id,
                'harga' => $harga->harga,
            ];
        })->toArray() ?? [];

        return $data;
    }


    public static function mutateFormDataBeforeCreate(array $data): array
    {
        // Ambil semua ID pelayanan yang dipilih
        $hargaIds = collect($data['detail_pelayanan'] ?? [])
            ->pluck('harga_id');

        // Hitung total langsung dari database
        $data['total_harga'] = Harga::whereIn('id', $hargaIds)->sum('harga');

        return $data;
    }


    public static function afterCreate(Model $record, array $data): void
    {
        $record->hargas()->sync(
            collect($data['detail_pelayanan'])->pluck('harga_id')
        );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pelanggan')
                    ->label('Pelanggan')
                    ->searchable(),

                TextColumn::make('hargas.pelayanan')
                    ->label('Jenis Pelayanan')
                    ->listWithLineBreaks() // agar tampil rapi per baris
                    ->limitList(3), // tampil max 3, sisanya "dan X lagi"

                TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->money('IDR'),

                TextColumn::make('user.name')
                    ->label('Karyawan'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Tanggal'),
            ])
            ->actions([
                EditAction::make()
                    ->modalHeading('Edit')
                    ->visible(fn() => Auth::user()?->role === 'karyawan'),

                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
