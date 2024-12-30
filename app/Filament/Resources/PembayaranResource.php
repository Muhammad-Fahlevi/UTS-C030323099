<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranResource\Pages;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_penyewaan')
                    ->relationship('penyewaan', 'id')
                    ->required(),
                // Forms\Components\TextInput::make('metode_pembayaran')->required(),
                Forms\Components\TextInput::make('jumlah_bayar')
                    ->numeric()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_pembayaran')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('penyewaan.id')->label('ID Penyewaan')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('metode_pembayaran')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jumlah_bayar')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pembayaran')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('id'),
                // Tables\Columns\TextColumn::make('metode_pembayaran'),
                // Tables\Columns\TextColumn::make('jumlah_bayar'),
                // Tables\Columns\TextColumn::make('tanggal_bayar'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}