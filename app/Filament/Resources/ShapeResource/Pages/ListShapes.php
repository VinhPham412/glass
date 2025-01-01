<?php

namespace App\Filament\Resources\ShapeResource\Pages;

use App\Filament\Resources\ShapeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShapes extends ListRecords
{
    protected static string $resource = ShapeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
