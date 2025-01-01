<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
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

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $label = 'Trang';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 3;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Tiêu đề')
                    ->required()
                    ->placeholder('Nhập tiêu đề')
                    ->maxlength(255)
                    // duy nhất nhưng có quyền trùng với chính nó
                    ->unique(ignoreRecord: true),
                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Ảnh đại diện')
                    ->disk('public')
                    ->directory('uploads/')
                    ->deleteUploadedFileUsing(function ($file) {
                        // Xóa file ảnh khi xóa bài viết hoặc cập nhật ảnh bài viết
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
                // thêm trường nội dung là 1 rich editor
                RichEditor::make('content')
                    ->label('Nội dung')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('uploads/')
                    ->required()
                    ->columnSpan('full'),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),
            ])
            //  Bỏ nút xoá mặc định trong form chỉnh sửa
            // ->removeDeleteButton()
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->sortable(
                        // CHuỗi  nào dài hơn thì lớn hơn
                        query: function (Builder $query, string $direction): Builder {
                            return $query->orderByRaw('LENGTH(title) ' . $direction)
                                ->orderBy('title', $direction);
                        }
                    )
                    ->searchable(),
                // thêm cột thumbnail
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Ảnh đại diện'),
                // Người tạo
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Người tạo')
                    ->searchable()
                    ->sortable(
                        query: function (Builder $query, string $direction): Builder {
                            return $query->join('users', 'pages.user_id', '=', 'users.id')
                                ->orderByRaw('LENGTH(users.name) ' . $direction)
                                ->orderBy('users.name', $direction);
                        }
                    ),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                ViewAction::make()
                    ->form([
                        Forms\Components\TextInput::make('title')
                            ->label('Tiêu đề')
                            ->required()
                            ->placeholder('Nhập tiêu đề bài viết')
                            ->maxlength(255),
                        // thêm trường thumbnail là trường file 
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Ảnh đại diện')
                            ->disk('public')
                            ->directory('uploads/')
                            ->deleteUploadedFileUsing(function ($file) {
                                // Xóa file ảnh khi xóa bài viết hoặc cập nhật ảnh bài viết
                                Storage::disk('public')->delete($file);
                            })
                            ->image(),

                        // thêm trường mô tả là trường rich editor
                        RichEditor::make('content')
                            ->label('Nội dung')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('uploads/')
                            ->required()
                            ->columnSpan('full'),
                        Forms\Components\Hidden::make('user_id')
                            ->default(auth()->id()),
                    ])
                    ->modal(),
            ])
            ->bulkActions([
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
            'index' => Pages\ListPages::route('/'),
            // 'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
