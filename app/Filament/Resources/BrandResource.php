<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\RelationManagers;
use App\Models\Brand;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-bold';

    public static ?string $label = 'Thương hiệu';

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
                    ->label('Tên thương hiệu')
                    ->required()
                    ->placeholder('Nhập tên thương hiệu')
                    ->maxlength(255)
                    ->unique(ignoreRecord: true),
                // thêm trường nội dung là 1 rich editor
                RichEditor::make('content')
                    ->label('Nội dung (mô tả thương hiệu)')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('uploads/')
                    ->columnSpan('full'),
                // thêm trường logo là trường file 
                Forms\Components\FileUpload::make('logo')
                    ->label('Ảnh Logo')
                    ->disk('public')
                    ->directory('uploads/')
                    ->deleteUploadedFileUsing(function ($file) {
                        // Xóa file ảnh khi xóa logo hoặc cập nhật logo
                        Storage::disk('public')->delete($file);
                    })
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                        '3:4',
                        '9:16',
                    ])
                    ->extraAttributes([
                        'data-image-transform-output-mime-type' => 'image/webp', // Tự động chuyển sang webp
                        'data-image-transform-output-quality' => '80', // Giảm chất lượng ảnh
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên thương hiệu')
                    ->sortable(
                        // Chuỗi nào dài hơn thì lớn hơn
                        query: function (Builder $query, string $direction): Builder {
                            return $query->orderByRaw('LENGTH(name)' . $direction)
                                ->orderBy('name', $direction);
                        }
                    )
                    ->searchable(),
                // thêm cột ảnh logo
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Ảnh logo'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // thêm action xóa
                Tables\Actions\DeleteAction::make(),
                ViewAction::make()
                    ->form([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên thương hiệu')
                            ->required()
                            ->placeholder('Nhập tên thương hiệu')
                            ->maxlength(255),
                        // thêm trường nội dung là 1 rich editor
                        RichEditor::make('content')
                            ->label('Nội dung (mô tả thương hiệu)')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('uploads/')
                            ->columnSpan('full'),
                        // thêm trường logo là trường file 
                        Forms\Components\FileUpload::make('logo')
                            ->label('Ảnh logo')
                            ->disk('public')
                            ->directory('uploads/')
                            ->deleteUploadedFileUsing(function ($file) {
                                // Xóa file ảnh khi xóa logo hoặc cập nhật ảnh logo
                                Storage::disk('public')->delete($file);
                            })
                            ->image(),
                    ])
                    ->modal(),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
