<?php
	
	namespace App\Filament\Resources\OrderResource\Widgets;
	
	use App\Models\Order;
	use Filament\Widgets\StatsOverviewWidget as BaseWidget;
	use Filament\Widgets\StatsOverviewWidget\Stat;
	
	class StatsOverview extends BaseWidget {
		protected function getStats(): array {
			return [
				Stat::make('Số lượng đơn hàng hôm nay', Order::whereDate('created_at', today())
					->count()
				)->chart([7, 2, 10, 3, 15, 4, 17])
					->color('success'),
				
			];
		}
	}
