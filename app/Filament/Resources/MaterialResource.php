<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaterialResource\Pages;
use App\Filament\Resources\MaterialResource\RelationManagers;
use App\Models\Material;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static ?string $label = 'Chất liệu';

    protected static ?string $navigationGroup = 'Phân loại';

    // public static function getPermissionPrefixes(): array
    // {
    //     return [
    //         'view',
    //         'view_any',
    //         'create',
    //         'update',
    //         'delete',
    //         'delete_any',
    //     ];
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Chất liệu')
                    ->required()
                    ->placeholder('Nhập tên chất liệu')
                    ->maxlength(255)
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên chất liệu')
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
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }
}
