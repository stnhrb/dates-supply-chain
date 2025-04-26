<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FactoryResource\Pages;
use App\Models\Factory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Database\Seeders\Cities;

class FactoryResource extends Resource
{
    protected static ?string $model = Factory::class;
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationGroup = 'Supply Chain Management';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('city')
                    ->options(Cities::getSaudiCities())
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('farms')
                    ->relationship(name: 'farms', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->native(false)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label("Factory Name")
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->label("Factory City")
                    ->searchable(),
                Tables\Columns\TextColumn::make('farms.name')
                    ->label('Factory Farms')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('Farms')
                    ->relationship('farms', 'name')
                    ->multiple()
                    ->preload()
                    ->native(false)
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

//    public static function infoList(InfoList $infoList): InfoList
//    {
//        return $infoList
//            ->schema([
//                Section::make("Factory")
//                ->description("Factory Information")
//                ->schema([
//                    TextEntry::make('name')
//                        ->label('Factory Name'),
//                    TextEntry::make('city')
//                        ->label('Factory City')
//                ])->columns(2),
//                Section::make("Farm")->schema([
//                    TextEntry::make('farms.name')
//                        ->label('Farm Palm Count'),
//                    TextEntry::make('farms.palm_count')
//                        ->label('Farm Dates Crop in KG'),
//                    TextEntry::make('farms.dates_crop_in_kg')
//                ])->columns(2),
//            ]);
//    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getWidgets(): array
    {
        return [
            FactoryResource\Widgets\FactoriesOverview::class,
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFactories::route('/'),
            'create' => Pages\CreateFactory::route('/create'),
            'view' => Pages\ViewFactory::route('/{record}'),
            'edit' => Pages\EditFactory::route('/{record}/edit'),
        ];
    }
}
