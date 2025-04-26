<?php

namespace App\Filament\Resources\ShopResource\Widgets;

use App\Models\Shop;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ShopsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Shops', Shop::count())
                ->icon("heroicon-o-building-storefront"),
            Stat::make('Total Sales', Shop::sum('sales') . " SAR")
                ->icon("heroicon-o-building-storefront"),
            Stat::make('Average Sales', Shop::avg('sales'). " SAR")
                ->icon("heroicon-o-building-storefront")
        ];
    }
}
