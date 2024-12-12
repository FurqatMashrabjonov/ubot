<?php

namespace App\Filament\Resources\ChatResource\Pages;

use Filament\Actions;
use App\Filament\Resources\ChatResource;
use Filament\Resources\Pages\EditRecord;

class EditChat extends EditRecord
{
    protected static string $resource = ChatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
