<?php

namespace App\Filament\Resources\FarmResource\Widgets;

use App\Models\Factory;
use App\Models\Farm;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FarmsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Farms', Farm::count())
                ->icon("heroicon-o-square-3-stack-3d"),
            Stat::make('Total Produced Crop', Farm::sum('dates_crop_in_kg') . " kg")
                ->icon("heroicon-o-square-3-stack-3d"),
            Stat::make('Total Number of Contracted Farms',
                Factory::with("farms")
                    ->getRelation("farms")
                    ->get(["id"])
                    ->unique()
                    ->count()
            )
        ];
    }
}
