<?php

namespace App\Filament\Widgets;

use App\Models\Shop;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ShopsWithHighestSales extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Shop::query()
                    ->orderBy('sales', 'desc')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Shop Name'),
                Tables\Columns\TextColumn::make('sales')
                    ->label('Sales')
            ])
            ->paginated(false);
    }
}
