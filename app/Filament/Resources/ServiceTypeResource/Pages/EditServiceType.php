<?php
namespace App\Filament\Resources\ServiceTypeResource\Pages;
use App\Filament\Resources\ServiceTypeResource;
use Filament\Resources\Pages\EditRecord;
class EditServiceType extends EditRecord
{
    protected static string $resource = ServiceTypeResource::class;
    protected function getHeaderActions(): array { return [\Filament\Actions\DeleteAction::make()]; }
}
