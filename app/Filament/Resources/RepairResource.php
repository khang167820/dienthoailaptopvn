<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RepairResource\Pages;
use App\Models\Repair;
use App\Models\DeviceModel;
use App\Models\ServiceType;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class RepairResource extends Resource
{
    protected static ?string $model = Repair::class;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static string | \UnitEnum | null $navigationGroup = 'Quản lý Dịch vụ';
    protected static ?string $navigationLabel = 'Bảng giá sửa chữa';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Section::make('Thông tin dịch vụ')->schema([
                Forms\Components\Select::make('device_model_id')
                    ->label('Dòng máy')
                    ->relationship('deviceModel', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('service_type_id')
                    ->label('Loại sửa chữa')
                    ->relationship('serviceType', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug (tự tạo)')
                    ->unique(ignoreRecord: true)
                    ->helperText('Để trống sẽ tự sinh từ tên dịch vụ + dòng máy'),
            ])->columns(2),

            Forms\Components\Section::make('Giá & Bảo hành')->schema([
                Forms\Components\TextInput::make('price')
                    ->label('Giá gốc (VNĐ)')
                    ->numeric()
                    ->prefix('₫'),
                Forms\Components\TextInput::make('sale_price')
                    ->label('Giá khuyến mãi (VNĐ)')
                    ->numeric()
                    ->prefix('₫'),
                Forms\Components\TextInput::make('warranty')
                    ->label('Bảo hành')
                    ->placeholder('6 tháng'),
                Forms\Components\TextInput::make('repair_time')
                    ->label('Thời gian sửa')
                    ->placeholder('30 phút'),
            ])->columns(4),

            Forms\Components\Section::make('Nội dung')->schema([
                Forms\Components\Textarea::make('short_description')
                    ->label('Mô tả ngắn')
                    ->rows(2),
                Forms\Components\RichEditor::make('content')
                    ->label('Nội dung chi tiết (SEO)')
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike', 'link',
                        'h2', 'h3', 'bulletList', 'orderedList',
                        'blockquote', 'codeBlock', 'attachFiles',
                    ])
                    ->columnSpanFull(),
            ]),

            Forms\Components\Section::make('FAQ (Schema SEO)')->schema([
                Forms\Components\Repeater::make('faq')
                    ->label('Câu hỏi thường gặp')
                    ->schema([
                        Forms\Components\TextInput::make('question')
                            ->label('Câu hỏi')
                            ->required(),
                        Forms\Components\Textarea::make('answer')
                            ->label('Trả lời')
                            ->required()
                            ->rows(2),
                    ])
                    ->collapsible()
                    ->defaultItems(0)
                    ->addActionLabel('+ Thêm câu hỏi'),
            ])->collapsible(),

            Forms\Components\Section::make('SEO & Hiển thị')->schema([
                Forms\Components\TextInput::make('meta_title')->label('Meta Title'),
                Forms\Components\Textarea::make('meta_description')->label('Meta Description')->rows(2),
                Forms\Components\Toggle::make('is_featured')->label('Nổi bật'),
                Forms\Components\Toggle::make('is_active')->label('Kích hoạt')->default(true),
                Forms\Components\TextInput::make('sort_order')->label('Thứ tự')->numeric()->default(0),
            ])->columns(2)->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('deviceModel.name')
                    ->label('Dòng máy')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('serviceType.name')
                    ->label('Dịch vụ')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Giá gốc')
                    ->money('VND', locale: 'vi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sale_price')
                    ->label('Giá KM')
                    ->money('VND', locale: 'vi')
                    ->color('success'),
                Tables\Columns\TextColumn::make('warranty')->label('Bảo hành'),
                Tables\Columns\IconColumn::make('is_featured')->label('Nổi bật')->boolean(),
                Tables\Columns\IconColumn::make('is_active')->label('Hoạt động')->boolean(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('device_model_id')
                    ->label('Dòng máy')
                    ->relationship('deviceModel', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('service_type_id')
                    ->label('Loại sửa')
                    ->relationship('serviceType', 'name'),
                Tables\Filters\TernaryFilter::make('is_active')->label('Trạng thái'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRepairs::route('/'),
            'create' => Pages\CreateRepair::route('/create'),
            'edit' => Pages\EditRepair::route('/{record}/edit'),
        ];
    }
}
