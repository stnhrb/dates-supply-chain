<?php

namespace App\Filament\Widgets;

use App\Models\Farm;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class FarmsWithHighestCrop extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Farm::query()
                    ->orderBy('dates_crop_in_kg', 'desc')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Farm Name'),
                Tables\Columns\TextColumn::make('dates_crop_in_kg')
                    ->label('Dates Crop in KG')
            ])
            ->paginated(false);
    }
}
