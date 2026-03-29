<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceTypeResource\Pages;
use App\Models\ServiceType;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceTypeResource extends Resource
{
    protected static ?string $model = ServiceType::class;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string | \UnitEnum | null $navigationGroup = 'Quản lý Dịch vụ';
    protected static ?string $navigationLabel = 'Loại dịch vụ';
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Section::make('Thông tin loại dịch vụ')->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Tên dịch vụ')->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('icon')->label('Icon'),
                Forms\Components\Textarea::make('description')->label('Mô tả')->rows(3),
                Forms\Components\TextInput::make('sort_order')->label('Thứ tự')->numeric()->default(0),
                Forms\Components\Toggle::make('is_active')->label('Kích hoạt')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Tên')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->label('Slug'),
                Tables\Columns\TextColumn::make('repairs_count')->label('Số DV')->counts('repairs'),
                Tables\Columns\IconColumn::make('is_active')->label('HĐ')->boolean(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceTypes::route('/'),
            'create' => Pages\CreateServiceType::route('/create'),
            'edit' => Pages\EditServiceType::route('/{record}/edit'),
        ];
    }
}
