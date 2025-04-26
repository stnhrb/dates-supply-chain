<?php

namespace App\Filament\Resources\FactoryResource\Widgets;

use App\Models\Factory;
use App\Models\Farm;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FactoriesOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Factories', Factory::count())
                ->icon("heroicon-o-home-modern"),
            Stat::make('Number of  Factories Contracted with Farms',
                Farm::with("factories")
                    ->getRelation("factories")
                    ->get(['id'])
                    ->unique()
                    ->count()),
            Stat::make('Number of Factories with no Contracted Farms',
                Factory::doesntHave("farms")
                    ->count()
            )
                ->icon("heroicon-o-home-modern"),
        ];
    }
}
