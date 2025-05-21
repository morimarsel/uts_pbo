<?php

namespace App\Filament\Resources\PenerimaBeasiswaResource\Pages;

use App\Filament\Resources\PenerimaBeasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenerimaBeasiswa extends EditRecord
{
    protected static string $resource = PenerimaBeasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
