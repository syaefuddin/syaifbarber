<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\PasswordInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

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
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('password')
                    ->password()
                    ->maxLength(255),

                Hidden::make('role')
                    ->default('karyawan'),

                FileUpload::make('foto')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('users')
                    ->imageEditor()
                    ->columnSpanFull(),

                TextInput::make('facebook')
                    ->label('Facebook URL')
                    ->url()
                    ->maxLength(255),

                TextInput::make('whatsapp')
                    ->label('WhatsApp')
                    ->tel()
                    ->maxLength(20),

                TextInput::make('instagram')
                    ->label('Instagram URL')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(40),

                TextColumn::make('name')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('role'),

                TextColumn::make('facebook')
                    ->label('FB')
                    ->limit(15)
                    ->toggleable(),

                TextColumn::make('whatsapp')
                    ->label('WA')
                    ->toggleable(),

                TextColumn::make('instagram')
                    ->label('IG')
                    ->limit(15)
                    ->toggleable(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('name');
    }

    public static function getRelations(): array
    {
        return []; // tidak ada relasi untuk sekarang
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('role', 'karyawan');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'create' => Pages\CreateUser::route('/create'),
            // 'edit-profile' => Pages\EditProfile::route('/edit-profile'),
        ];
    }
}
