<?php

namespace App\Filament\Resources\FarmResource\RelationManagers;

use Database\Seeders\Cities;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class LandsRelationManager extends RelationManager
{
    protected static string $relationship = 'lands';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('city')
                    ->options(Cities::getSaudiCities())
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('latitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('longitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('land_size')
                    ->required()
                    ->numeric(),
            ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('city')
            ->columns([
                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->sortable()
                    ->numeric(),
                Tables\Columns\TextColumn::make('longitude')
                    ->sortable()
                    ->numeric(),
                Tables\Columns\TextColumn::make('land_size')
                    ->sortable()
                    ->numeric(),
            ])
            ->filters([
        //
    ])
        ->headerActions([
            Tables\Actions\CreateAction::make(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }
}
