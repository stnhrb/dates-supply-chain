<?php

namespace App\Filament\Resources\ShopResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SalesPersonRelationManager extends RelationManager
{
    protected static string $relationship = 'salesPerson';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make("gender")
                    ->options(['M', 'F'])
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('salary')
                    ->label('Salary')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100000)
                    ->default(0)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('Phone Number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salary')
                    ->label('Salary')
                    ->money('sar', true)
                    ->sortable(),
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
