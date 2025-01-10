<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CatResource\Pages;
use App\Filament\Resources\CatResource\RelationManagers;
use App\Forms\Components\CustomTagsInput;
use App\Models\Cat;
use App\Models\Promotion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;

class CatResource extends Resource
{
    protected static ?string $model = Cat::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $label = "Danh mục";

    protected static ?string $navigationIcon = "heroicon-o-tag";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Tên')
                ->placeholder('Nhập tên danh mục')
                ->required(),
                Forms\Components\Select::make('promotion_id')
                    ->label('Chương trình khuyến mãi')
                    ->options(function () {
                        $promotions = Promotion::all()->pluck('name', 'id')->toArray();
                        return [null => 'Không áp dụng khuyến mãi'] + $promotions;
                    })
                    ->default(null)
                    ->placeholder('Chọn chương trình khuyến mãi')
                    ->searchable(),
                CustomTagsInput::make('products')
                    ->label('Sản phẩm')
                    ->relationship()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên'),
                Tables\Columns\TextColumn::make('promotion.name')
                    ->label('Chương trình khuyến mãi')
                    ->default('Không áp dụng khuyến mãi')
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
            'index' => Pages\ListCats::route('/'),
            'create' => Pages\CreateCat::route('/create'),
            'edit' => Pages\EditCat::route('/{record}/edit'),
        ];
    }
}
