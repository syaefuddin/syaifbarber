<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SemirResource\Pages;
use App\Filament\Resources\SemirResource\RelationManagers;
use App\Models\Semir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class SemirResource extends Resource
{
    protected static ?string $model = Semir::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Semir';
    protected static ?string $pluralLabel = 'Semir';

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
                TextInput::make('nama_semir')
                    ->label('Nama Semir')
                    ->required()
                    ->maxLength(255),
                TextInput::make('deskripsi')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('foto')
                    ->image()
                    ->directory('semirs') // akan disimpan ke storage/app/public/semirs
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_semir')->label('Nama Semir'),
                TextColumn::make('deskripsi')->searchable()->limit(25)->sortable(),
                ImageColumn::make('foto'),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->filters([
                //
            ]);
        // ->actions([
        //     Tables\Actions\EditAction::make(),
        // ])
        // ->bulkActions([
        //     Tables\Actions\BulkActionGroup::make([
        //         Tables\Actions\DeleteBulkAction::make(),
        //     ]),
        // ])
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSemirs::route('/'),
            'create' => Pages\CreateSemir::route('/create'),
            'edit' => Pages\EditSemir::route('/{record}/edit'),
        ];
    }
}
