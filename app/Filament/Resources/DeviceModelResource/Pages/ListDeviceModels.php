<?php
namespace App\Filament\Resources\DeviceModelResource\Pages;
use App\Filament\Resources\DeviceModelResource;
use Filament\Resources\Pages\ListRecords;
class ListDeviceModels extends ListRecords
{
    protected static string $resource = DeviceModelResource::class;
    protected function getHeaderActions(): array { return [\Filament\Actions\CreateAction::make()]; }
}
