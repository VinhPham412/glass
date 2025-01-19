<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
	
	protected function handleRecordUpdate(Model $record, array $data): Model
	{
//		dd($record->status,$data['status']);
		dd($record->orderItems);
		
		$record->update($data);
		
		return $record;
	}
}
