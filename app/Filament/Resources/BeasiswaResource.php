<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeasiswaResource\Pages;
use App\Filament\Resources\BeasiswaResource\RelationManagers;
use App\Models\Beasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;


class BeasiswaResource extends Resource
{
    protected static ?string $model = Beasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_beasiswa')
                    ->label('Nama Beasiswa')
                    ->required()
                    ->maxLength(100),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_beasiswa')->label('Nama Beasiswa'),
                Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi'),
                Tables\Columns\TextColumn::make('tanggal_mulai')->date()->label('Tanggal Mulai'),
                Tables\Columns\TextColumn::make('tanggal_berakhir')->date()->label('Tanggal Berakhir'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBeasiswas::route('/'),
            'create' => Pages\CreateBeasiswa::route('/create'),
            'edit' => Pages\EditBeasiswa::route('/{record}/edit'),
        ];
    }
}
