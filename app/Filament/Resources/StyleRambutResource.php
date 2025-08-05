<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StyleRambutResource\Pages;
use App\Filament\Resources\StyleRambutResource\RelationManagers;
use App\Models\StyleRambut;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class StyleRambutResource extends Resource
{
    protected static ?string $model = StyleRambut::class;

    protected static ?string $navigationIcon = 'heroicon-o-scissors';
    protected static ?string $navigationLabel = 'Model Rambut';
    protected static ?string $pluralLabel = 'Model Rambut';

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
                TextInput::make('nama_style')
                    ->label('Nama Model Rambut')
                    ->required()
                    ->maxLength(255),
                TextInput::make('deskripsi')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('foto')
                    ->image()
                    ->directory('style_rambuts')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_style')->label('Nama Model'),
                TextColumn::make('deskripsi')->searchable()->limit(25)->sortable(),
                ImageColumn::make('foto'),
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
            'index' => Pages\ListStyleRambuts::route('/'),
            'create' => Pages\CreateStyleRambut::route('/create'),
            'edit' => Pages\EditStyleRambut::route('/{record}/edit'),
        ];
    }
}
