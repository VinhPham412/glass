<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShapeResource\Pages;
use App\Filament\Resources\ShapeResource\RelationManagers;
use App\Models\Shape;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShapeResource extends Resource
{
    protected static ?string $model = Shape::class;

    protected static ?string $navigationIcon = 'heroicon-o-strikethrough';

    public static ?string $label = 'Kiểu dáng';

    protected static ?string $navigationGroup = 'Phân loại';

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Kiểu dáng')
                    ->required()
                    ->placeholder('Nhập tên kiểu dáng')
                    ->maxlength(255)
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên kiểu dáng')
                    ->sortable(
                        // Chuỗi nào dài hơn thì lớn hơn
                        query: function (Builder $query, string $direction): Builder {
                            return $query->orderByRaw('LENGTH(name)' . $direction)
                                ->orderBy('name', $direction);
                        }
                    )
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // thêm action xóa
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListShapes::route('/'),
            'create' => Pages\CreateShape::route('/create'),
            'edit' => Pages\EditShape::route('/{record}/edit'),
        ];
    }
}
