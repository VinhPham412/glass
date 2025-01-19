<?php
	
	namespace App\Filament\Resources\OrderResource\Pages;
	
	use App\Filament\Resources\OrderResource;
	use App\Models\Version;
	use Filament\Actions;
	use Filament\Resources\Pages\EditRecord;
	use Illuminate\Database\Eloquent\Model;
	use Filament\Notifications\Notification;
	
	class EditOrder extends EditRecord {
		protected static string $resource = OrderResource::class;
		
		protected function getHeaderActions(): array {
			return [
				Actions\DeleteAction::make(),
			];
		}
		
		protected function handleRecordUpdate(Model $record, array $data): Model {
			//		dd($record->status,$data['status']);
			//		dd($record->orderItems,$data);
			//		foreach ($record->orderItems as $item) {
			//
			//		}
			$old_status = $record->status;
			$new_status = $data['status'];

			if (($old_status == "pending" or $old_status == "done") and $new_status == "cancel") {
				foreach ($record->orderItems as $item) {
					$version = Version::find($item->version->id);
					$version->stock += $item->quantity;
					$version->save(); // Persist the changes to the database
				}
				
				Notification::make()
					->title('Chuyển từ đang chờ hoặc đã xong sang hủy')
					->body('Tăng lại tồn kho cho các phiên bản')
					->success()
					->send();
				
				$record->update($data);
			}
			
			if ($old_status == "cancel" and ($new_status == "done" or $new_status == "pending")) {
				$can_update = true;
				foreach ($record->orderItems as $item) {
					if ($item->version->stock < $item->quantity) {
						$can_update = false;
						break;
					}
				}
				
				if ($can_update) {
					foreach ($record->orderItems as $item) {
						$version = Version::find($item->version->id);
						$version->stock -= $item->quantity;
						$version->save(); // Persist the changes to the database
					}
					Notification::make()
						->title('Chuyển từ hủy sang đang chờ hoặc đã xong')
						->body('Giảm lại tồn kho cho các phiên bản')
						->success()
						->send();
					$record->update($data);
				} else {
					Notification::make()
						->title('Chuyển thất bại')
						->body('Vì không đủ tồn kho')
						->danger()
						->send();
				}
				
			}
			
			return $record;
		}
	}
