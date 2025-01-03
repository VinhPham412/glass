<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $label  = "Sản phẩm";

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
                    ->unique(ignoreRecord: true),
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
                        \Filament\Forms\Components\Actions\Action::make('Thêm thương hiệu')
                            ->icon('heroicon-o-plus-circle')
                            ->color('success')
                            ->label('thương hiệu') // Đặt tên nút
                            ->modalHeading('Chỉnh sửa thương hiệu') // Tiêu đề modal
                            ->modalContent(
                                view('partials.admin_brand') // View tạo thương hiệu
                            )
                            // bỏ nủt gửi trong modal ở filament 3x
                            ->modalSubmitAction(false)
                            ->stickyModalHeader(),

                    ),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
}
