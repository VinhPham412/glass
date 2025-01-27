<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget {
    protected function getStats(): array {
        return [
            Stat::make('Số lượng đơn hàng hôm nay', Order::whereDate('created_at', today())
                ->count()
            )
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            // Tổng tiền đơn hàng hôm nay
            Stat::make('Tổng tiền đơn hàng hôm nay', $this->getTotalOrderAmountToday())
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }

    protected function getTotalOrderAmountToday(): string
    {
        $total = Order::whereDate('orders.created_at', today())
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->select(DB::raw('SUM(order_items.price * order_items.quantity) as total_amount'))
            ->value('total_amount') ?? 0;

        return number_format($total, 0, ',', '.') . ' VND';
    }
}