<?php

namespace App\Filament\Resources\FarmResource\Pages;

use App\Filament\Resources\FarmResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFarm extends CreateRecord
{
    protected static string $resource = FarmResource::class;

    protected function getCreatedNotificationTitle(): string
    {
        return 'Farm Created';
    }
}
