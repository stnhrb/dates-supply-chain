<?php

namespace App\Filament\Widgets;

use App\Models\Factory;
use App\Models\Farm;
use App\Models\Shop;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FarmsStatOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Farms', Farm::query()->count()),
            Stat::make('Factories', Factory::query()->count()),
            Stat::make('Shops', Shop::query()->count())
        ];
    }
}
