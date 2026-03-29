<?php
namespace App\Filament\Resources\ServiceTypeResource\Pages;
use App\Filament\Resources\ServiceTypeResource;
use Filament\Resources\Pages\ListRecords;
class ListServiceTypes extends ListRecords
{
    protected static string $resource = ServiceTypeResource::class;
    protected function getHeaderActions(): array { return [\Filament\Actions\CreateAction::make()]; }
}
