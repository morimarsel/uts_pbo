<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenerimaBeasiswaResource\Pages;
use App\Filament\Resources\PenerimaBeasiswaResource\RelationManagers;
use App\Models\PenerimaBeasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;


class PenerimaBeasiswaResource extends Resource
{
    protected static ?string $model = PenerimaBeasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama_mahasiswa')
                ->label('Nama Mahasiswa')
                ->required()
                ->maxLength(100),

            TextInput::make('nim')
                ->label('NIM')
                ->required()
                ->minLength(8)
                ->maxLength(15)
                ->unique(ignoreRecord: true),

            TextInput::make('ipk')
                ->label('IPK')
                ->required()
                ->numeric()
                ->minValue(0)
                ->maxValue(4),

            Select::make('beasiswa_id')
                ->label('Jenis Beasiswa')
                ->relationship('beasiswa', 'nama_beasiswa')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_mahasiswa')->label('Nama Mahasiswa'),
                Tables\Columns\TextColumn::make('nim')->label('NIM'),
                Tables\Columns\TextColumn::make('fakultas')->label('Fakultas'),
                Tables\Columns\TextColumn::make('ipk')->label('IPK'),
                Tables\Columns\TextColumn::make('beasiswa.nama_beasiswa')->label('Jenis Beasiswa'),
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
            'index' => Pages\ListPenerimaBeasiswas::route('/'),
            'create' => Pages\CreatePenerimaBeasiswa::route('/create'),
            'edit' => Pages\EditPenerimaBeasiswa::route('/{record}/edit'),
        ];
    }
}
