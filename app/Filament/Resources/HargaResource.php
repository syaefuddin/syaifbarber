<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HargaResource\Pages;
use App\Filament\Resources\HargaResource\RelationManagers;
use App\Models\Harga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class HargaResource extends Resource
{
    protected static ?string $model = Harga::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Harga Pelayanan';
    protected static ?string $pluralLabel = 'Daftar Harga';

    public static function canAccess(): bool
    {
        if (Auth::user()->role == 'admin') {
            return true;
        }
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('pelayanan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('harga')
                    ->required()
                    ->maxLength(255)
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pelayanan')->searchable()->sortable(),
                TextColumn::make('harga')
                    ->money('IDR') // atau hilangkan jika hanya angka biasa
                    ->sortable(),
                TextColumn::make('created_at')->dateTime()->label('Waktu'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHargas::route('/'),
            'create' => Pages\CreateHarga::route('/create'),
            'edit' => Pages\EditHarga::route('/{record}/edit'),
        ];
    }
}
