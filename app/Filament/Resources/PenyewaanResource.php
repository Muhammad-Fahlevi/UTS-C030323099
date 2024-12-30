<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyewaanResource\Pages;
use App\Models\Penyewaan;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PenyewaanResource extends Resource
{
    protected static ?string $model = Penyewaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_kendaraan')
                    ->relationship('kendaraan', 'jenis_kendaraan')
                    ->required(),
                Forms\Components\Select::make('id_pelanggan')
                    ->relationship('pelanggan', 'nama')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_sewa')->required(),
                Forms\Components\DatePicker::make('tanggal_kembali')->nullable(),
                Forms\Components\TextInput::make('total_biaya')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('kendaraan.jenis_kendaraan')->sortable()->searchable(),
                TextColumn::make('pelanggan.nama')->sortable()->searchable(),
                TextColumn::make('tanggal_sewa')->sortable()->searchable(),
                TextColumn::make('tanggal_kembali')->sortable()->searchable(),
                TextColumn::make('total_biaya')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenyewaans::route('/'),
            'create' => Pages\CreatePenyewaan::route('/create'),
            'edit' => Pages\EditPenyewaan::route('/{record}/edit'),
        ];
    }
}