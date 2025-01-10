<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Brand;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use  App\Filament\Resources\BrandResource\Pages\CreateBrand;
use Filament\Tables\Filters;
use Filament\Resources\Components\Tab;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\Repeater;
use Filament\Support\RawJs;
use Illuminate\Support\Facades\DB;
use App\Forms\Components\CustomTagsInput;


class ProductResource extends Resource
{
    use WithFileUploads;

    protected static ?string $model = Product::class;

    protected static ?string $label = "Sản phẩm";

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Tên sản phẩm')
                    ->required()
                    ->placeholder('Nhập tên sản phẩm')
                    ->maxlength(255)
                    ->unique(ignoreRecord: true)
                    ->columnSpan('full'),
                Forms\Components\RichEditor::make('description')
                    ->label('Mô tả')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('uploads/')
                    ->required()
                    ->columnSpan('full'),
                Forms\Components\Select::make('brand_id')
                    ->label('Thương hiệu')
                    ->options(fn() => \App\Models\Brand::pluck('name', 'id')->toArray())
                    ->required()
                    ->suffixAction(
                        Action::make('Thêm thương hiệu')
                            ->icon('heroicon-o-plus-circle')
                            ->color('success')
                            ->label('thương hiệu')
                            ->modalHeading('Thêm thương hiệu mới')
                            ->modalContent(
                            // Gọi ra livewire component AdminBrand
                                view('partials.admin_brand')
                            )
                            ->closeModalByClickingAway(true)
                    )
                    ->columnSpan('1')
                ,
                Forms\Components\Select::make('material_id')
                    ->label('Chất liệu')
                    ->options(fn() => \App\Models\Material::pluck('name', 'id')->toArray())
                    ->required()
                    ->suffixAction(
                        Action::make('Thêm Chất liệu')
                            ->icon('heroicon-o-plus-circle')
                            ->color('success')
                            ->label('Chất liệu')
                            ->modalHeading('Thêm Chất liệu mới')
                            ->modalContent(
                            // Gọi ra livewire component AdminBrand
                                view('partials.admin_material')
                            )
                            ->closeModalByClickingAway(true)
                    )
                    ->columnSpan('1'),
                Forms\Components\Select::make('origin_id')
                    ->label('Xuất xứ')
                    ->options(fn() => \App\Models\Origin::pluck('name', 'id')->toArray())
                    ->required()
                    ->suffixAction(
                        Action::make('Thêm Xuất xứ')
                            ->icon('heroicon-o-plus-circle')
                            ->color('success')
                            ->label('Xuất xứ')
                            ->modalHeading('Thêm Xuất xứ mới')
                            ->modalContent(
                            // Gọi ra livewire component AdminBrand
                                view('partials.admin_origin')
                            )
                            ->closeModalByClickingAway(true)
                    )
                    ->columnSpan('1'),
                Forms\Components\Select::make('shape_id')
                    ->label('Kiểu dáng')
                    ->options(fn() => \App\Models\Shape::pluck('name', 'id')->toArray())
                    ->required()
                    ->suffixAction(
                        Action::make('Thêm Kiểu dáng')
                            ->icon('heroicon-o-plus-circle')
                            ->color('success')
                            ->label('Kiểu dáng')
                            ->modalHeading('Thêm Kiểu dáng mới')
                            ->modalContent(
                            // Gọi ra livewire component AdminBrand
                                view('partials.admin_shape')
                            )
                            ->closeModalByClickingAway(true)
                    )
                    ->columnSpan('1'),
                Forms\Components\Select::make('style_id')
                    ->label('Phong cách')
                    ->options(fn() => \App\Models\Style::pluck('name', 'id')->toArray())
                    ->required()
                    ->suffixAction(
                        Action::make('Thêm Phong cách')
                            ->icon('heroicon-o-plus-circle')
                            ->color('success')
                            ->label('Phong cách')
                            ->modalHeading('Thêm Phong cách mới')
                            ->modalContent(
                            // Gọi ra livewire component AdminBrand
                                view('partials.admin_style')
                            )
                            ->closeModalByClickingAway(true)
                    )
                    ->columnSpan('1'),
                Forms\Components\Repeater::make('versions')
                    ->label('Phiên bản')
                    ->schema([
//                        Forms\Components\FileUpload::make('images')
//                            ->label('Ảnh phiên bản')
//                            ->image()
//                            ->multiple()
//                            ->maxFiles(5) // Giảm số lượng file tối đa để tránh quá tải
//                            ->disk('public')
//                            ->directory('uploads/')
//                            ->deleteUploadedFileUsing(function ($file) {
//                                Storage::disk('public')->delete($file);
//                            })
//                            ->imagePreviewHeight('100')
//                            ->loadingIndicatorPosition('left')
//                            ->panelAspectRatio('16:9')
//                            ->panelLayout('grid')
//                            ->imageResizeMode('cover')
//                            ->imageResizeTargetWidth('100')
//                            ->imageResizeTargetHeight('100')
//                            ->imagePreviewHeight('100')
//                            ->removeUploadedFileButtonPosition('top-right')
//                            ->uploadButtonPosition('left')
//                            ->uploadProgressIndicatorPosition('bottom')
//                            ->maxSize(5120) // 5MB
//                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
//                            ->helperText('Tải lên tối đa 5 ảnh. Mỗi ảnh không quá 5MB.')
//                            ->columnSpan('1'),
                        Forms\Components\Repeater::make('images')
                            ->label('Ảnh phiên bản')
                            ->helperText('Mỗi ảnh không quá 5MB.')
                            ->schema([
                                Forms\Components\FileUpload::make('link')
                                    ->label('Ảnh phiên bản')
                                    ->image()
//                                    ->maxFiles(1) // Giảm số lượng file tối đa để tránh quá tải
                                    ->disk('public')
                                    ->directory('uploads/')
                                    ->deleteUploadedFileUsing(function ($file) {
                                        Storage::disk('public')->delete($file);
                                    })
//                                    ->imagePreviewHeight('50')
//                                    ->loadingIndicatorPosition('left')
//                                    ->panelAspectRatio('16:9')
//                                    ->panelLayout('grid')
//                                    ->imageResizeMode('cover')
//                                    ->imageResizeTargetWidth('50')
//                                    ->imageResizeTargetHeight('50')
//                                    ->imagePreviewHeight('50')
//                                    ->removeUploadedFileButtonPosition('top-right')
//                                    ->uploadButtonPosition('left')
//                                    ->uploadProgressIndicatorPosition('bottom')
                                    ->maxSize(5120) // 5MB
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                    ->imageEditor()
                                    ->columnSpan('1'),
                            ])
                            ->columns([
                                'sm' => 1,
                                'lg' => 1,
                            ])
                            ->columnSpan('4')
                            ->cloneable()
                            ->reorderableWithButtons()
                            ->relationship()
                            ->grid(4),
                        Forms\Components\TextInput::make('price')
                            ->label('Giá')
                            ->required()
                            ->numeric()
                            ->step(1000)
                            ->inputMode('decimal')
                            ->mask(RawJs::make('$money($input)'))
                            ->prefix('vnd')
                            ->stripCharacters(','),
                        Forms\Components\TextInput::make('stock')
                            ->label('Tồn kho')
                            ->required(),
                        Forms\Components\Select::make('size')
                            ->label('Kích thước')
                            ->options([
                                'S' => 'S',
                                'M' => 'M',
                                'L' => 'L',
                                'XL' => 'XL',
                            ])
                            ->required(),
                        Forms\Components\Select::make('color')
                            ->label('Màu sắc')
                            ->options([
                                'Đỏ' => 'Đỏ',
                                'Vàng' => 'Vàng',
                                'Trắng' => 'Trắng',
                                'Cam' => 'Cam',
                                'Hồng' => 'Hồng',
                                'Tím' => 'Tím',
                                'Xanh lá' => 'Xanh lá',
                                'Đen' => 'Đen',
                                'Xanh dương' => 'Xanh dương',
                                'Xám' => 'Xám',
                                'Nâu' => 'Nâu',
                                'Hồng đậm' => 'Hồng đậm',
                                'Xanh rêu' => 'Xanh rêu',
                                'Xanh lam' => 'Xanh lam',
                                'Xanh ngọc' => 'Xanh ngọc',
                                'Xanh lục' => 'Xanh lục',
                                'Xanh đen' => 'Xanh đen',
                            ])
                            ->required(),
                    ])
                    ->columns([
                        'sm' => 1,
                        'lg' => 8,
                    ])
                    ->columnSpan('full')
                    ->cloneable()
                    ->reorderableWithDragAndDrop()
                    ->reorderableWithButtons()
                    ->relationship()
                    ->collapsed()
                    ->reorderable()
                ,
                CustomTagsInput::make('cats')
                    ->label('Danh mục')
                    ->relationship()


            ])
            ->columns([
                'sm' => 2,
                'lg' => 5,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->sortable(
                    // Chuỗi nào dài hơn thì lớn hơn
                        query: function (Builder $query, string $direction): Builder {
                            return $query->orderByRaw('LENGTH(name) ' . $direction)
                                ->orderBy('name', $direction);
                        }
                    )
                    ->searchable()
                ,
                Tables\Columns\ImageColumn::make('versions.images.link')
                    ->label('Ảnh')
                    ->state(function ($record) {
                        // Lấy phiên bản đầu tiên
                        $firstVersion = $record->versions()->first();
                        if ($firstVersion) {
                            // Lấy ảnh đầu tiên của phiên bản đầu tiên
                            $firstImage = $firstVersion->images()->first();
                            return $firstImage ? $firstImage->link : null;
                        }
                        return null;
                    })
                    ->circular()
                    ->defaultImageUrl(url('https://robohash.org/anh_rong')) ,// Thêm ảnh mặc định nếu không có ảnh
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Thương hiệu')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('material.name')
                    ->label('Chất liệu')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('origin.name')
                    ->label('Xuất xứ')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('shape.name')
                    ->label('Kiểu dáng')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('style.name')
                    ->label('Phong cách')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('versions_count')
                    ->counts('versions')
                    ->label('Số phiên bản')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('versions_sum_stock')
                    ->sum('versions', 'stock')
                    ->label('Tồn kho')
                    ->sortable()
                    ->toggleable()
                    ->default(0),
            ])
            ->filters([
                Filters\SelectFilter::make('brand_id')
                    ->label('Thương hiệu')
                    ->options(fn() => \App\Models\Brand::pluck('name', 'id')->toArray()),
                Filters\SelectFilter::make('material_id')
                    ->label('Chất liệu')
                    ->options(fn() => \App\Models\Material::pluck('name', 'id')->toArray()),
                Filters\SelectFilter::make('origin_id')
                    ->label('Xuất xứ')
                    ->options(fn() => \App\Models\Origin::pluck('name', 'id')->toArray()),
                Filters\SelectFilter::make('shape_id')
                    ->label('Kiểu dáng')
                    ->options(fn() => \App\Models\Shape::pluck('name', 'id')->toArray()),
                Filters\SelectFilter::make('style_id')
                    ->label('Phong cách')
                    ->options(fn() => \App\Models\Style::pluck('name', 'id')->toArray()),


            ], layout: FiltersLayout::AboveContentCollapsible)->filtersFormColumns(5)
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->striped();
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

//    public function getTabs(): array
//    {
//        return [
//            'all' => Tab::make(),
//        ];
//    }
}
