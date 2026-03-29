<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceModelResource\Pages;
use App\Models\DeviceModel;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DeviceModelResource extends Resource
{
    protected static ?string $model = DeviceModel::class;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-device-phone-mobile';
    protected static string | \UnitEnum | null $navigationGroup = 'Quản lý Dịch vụ';
    protected static ?string $navigationLabel = 'Dòng máy';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Section::make('Thông tin dòng máy')->schema([
                Forms\Components\Select::make('brand_id')
                    ->label('Thương hiệu')
                    ->relationship('brand', 'name')
                    ->searchable()->preload()->required(),
                Forms\Components\Select::make('category_id')
                    ->label('Danh mục')
                    ->relationship('category', 'name')
                    ->searchable()->preload()->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Tên dòng máy')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) =>
                        $set('slug', Str::slug($state))
                    ),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\FileUpload::make('image')
                    ->label('Hình ảnh')
                    ->image()
                    ->directory('devices'),
                Forms\Components\Textarea::make('description')
                    ->label('Mô tả')
                    ->rows(3),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Thứ tự')->numeric()->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->label('Kích hoạt')->default(true),
            ])->columns(2),
            Forms\Components\Section::make('SEO')->schema([
                Forms\Components\TextInput::make('meta_title')->label('Meta Title'),
                Forms\Components\Textarea::make('meta_description')->label('Meta Description')->rows(2),
            ])->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Ảnh')->circular(),
                Tables\Columns\TextColumn::make('name')->label('Tên')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('brand.name')->label('Hãng')->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Danh mục'),
                Tables\Columns\TextColumn::make('repairs_count')->label('Số DV')
                    ->counts('repairs'),
                Tables\Columns\IconColumn::make('is_active')->label('HĐ')->boolean(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('brand_id')
                    ->label('Hãng')->relationship('brand', 'name'),
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Danh mục')->relationship('category', 'name'),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeviceModels::route('/'),
            'create' => Pages\CreateDeviceModel::route('/create'),
            'edit' => Pages\EditDeviceModel::route('/{record}/edit'),
        ];
    }
}
