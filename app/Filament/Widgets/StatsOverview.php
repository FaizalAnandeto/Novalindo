<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pesanan', Order::count())
                ->description('Semua pesanan masuk')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('danger'),
            Stat::make('Pesanan Pending', Order::where('status', 'pending')->count())
                ->description('Menunggu konfirmasi')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('Total Produk', Product::count())
                ->description(Category::count() . ' kategori')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),
            Stat::make('Pendapatan', 'Rp ' . number_format(Order::where('status', 'completed')->sum('total_amount'), 0, ',', '.'))
                ->description('Dari pesanan selesai')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('info'),
        ];
    }
}
