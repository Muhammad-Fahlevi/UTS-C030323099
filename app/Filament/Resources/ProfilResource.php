<?php

namespace App\Filament\Resources;


use App\Filament\Resources\ProfilResource\Pages;
use App\Filament\Resources\ProfilResource\RelationManagers;
use App\Models\Profil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ProfilResource extends Resource
{
    protected static ?string $model = Profil::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->required(),
                Forms\Components\TextInput::make('NIM')
                    ->label('NIM')
                    ->required()
                    ->unique(),
                Forms\Components\TextInput::make('prodi')
                    ->label('Prodi')
                    ->required(),
                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat')
                    ->nullable(),
                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar Profil')
                    ->image()
                    ->directory('gambar_profils')
                    ->maxSize(2048)
                    ->nullable(), // Tidak wajib diisi
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                ->searchable(),
                Tables\Columns\TextColumn::make('NIM')
                ->searchable(),
                Tables\Columns\TextColumn::make('prodi')
                ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProfils::route('/'),
            'create' => Pages\CreateProfil::route('/create'),
            'edit' => Pages\EditProfil::route('/{record}/edit'),
        ];
    }
}
