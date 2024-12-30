<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Filters;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use App\Filament\Exports\ProductExporter;
use App\Models\CatPost;
use Livewire\Livewire;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ViewAction;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class PostResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Post::class;
    // đổi tên model từ PostResource thành Bài viết
    public static ?string $label = 'Bài viết';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
            'publish',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Tiêu đề')
                    ->required()
                    ->placeholder('Nhập tiêu đề bài viết')
                    ->maxlength(255)
                    ->unique(ignoreRecord: true),
                // thêm trường thumbnail là trường file 
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
                // thêm trường mô tả là trường rich editor
                RichEditor::make('content')
                    ->label('Nội dung')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('uploads/')
                    ->required()
                    ->columnSpan('full'),
                // Thêm trường select để chọn ẩn/hiện bài viết 
                Forms\Components\Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'show' => 'Hiện',
                        'hide' => 'Ẩn',
                    ])
                    ->required(),

                // thêm trường danh mục
                Forms\Components\Select::make('catpost_id')
                    ->label('Danh mục')
                    ->options(fn() => \App\Models\CatPost::pluck('title', 'id')->toArray())
                    ->required()
                    ->suffixAction(
                        \Filament\Forms\Components\Actions\Action::make('Thêm danh mục')
                            ->icon('heroicon-o-plus-circle')
                            ->color('success')
                            ->label('Danh mục') // Đặt tên nút
                            ->modalHeading('Chỉnh sửa danh mục') // Tiêu đề modal
                            ->modalContent(
                                view('partials.admin_cat_post') // View tạo danh mục
                            )
                            // bỏ nủt gửi trong modal ở filament 3x
                            ->modalSubmitAction(false)
                            ->stickyModalHeader()
                            ,

                    ),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),
            ])
            // thêm nút vào đầu form để quay lại danh sách


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
                // thêm cột status
                Tables\Columns\TextColumn::make('status')
                    ->label('Trạng thái')
                    ->formatStateUsing(fn(string $state): string => $state === 'show' ? 'Hiện' : 'Ẩn')
                    ->color(fn(string $state): string => $state === 'show' ? 'success' : 'danger') // Đặt màu theo trạng thái
                    ->toggleable(true),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Người tạo')
                    ->searchable()
                    ->sortable(
                        query: function (Builder $query, string $direction): Builder {
                            return $query->join('users', 'posts.user_id', '=', 'users.id')
                                ->orderByRaw('LENGTH(users.name) ' . $direction)
                                ->orderBy('users.name', $direction);
                        }
                    ),
                Tables\Columns\TextColumn::make('catpost.title')
                    ->label('Danh mục')
                    ->searchable()
                    ->sortable(
                        query: function (Builder $query, string $direction): Builder {
                            return $query->join('cat_posts', 'posts.catpost_id', '=', 'cat_posts.id')
                                ->orderByRaw('LENGTH(cat_posts.title) ' . $direction)
                                ->orderBy('cat_posts.title', $direction);
                        }
                    )
                    ->toggleable(true),
            ])
            ->filters([
                Filters\SelectFilter::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'show' => 'Hiện',
                        'hide' => 'Ẩn',
                    ]),
                // thêm filter theo danh mục
                Filters\SelectFilter::make('catpost_id')
                    ->label('Danh mục')
                    ->options(fn() => \App\Models\CatPost::pluck('title', 'id')->toArray()),
                // Filters\Filter::make('is_status')
                //     ->label('Trạng thái Hiện')
                //     ->query(fn (Builder $query): Builder => $query->where('status', 'show'))
                //     ->toggle(),

            ])
            ->actions([
                // thêm action chỉnh sửa chi tiết
                Tables\Actions\EditAction::make(),
                // thêm action xóa
                Tables\Actions\DeleteAction::make(),
                // Thêm action ẩn
                Action::make('Ẩn/Hiện')
                    ->action(fn(Post $record) => $record->update(['status' => $record->status === 'show' ? 'hide' : 'show'])),
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
                        // Thêm trường select để chọn ẩn/hiện bài viết 
                        Forms\Components\Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'show' => 'Hiện',
                                'hide' => 'Ẩn',
                            ])
                            ->required(),
                        // thêm trường danh mục
                        Forms\Components\Select::make('catpost_id')
                            ->label('Danh mục')
                            ->options(fn() => \App\Models\CatPost::pluck('title', 'id')->toArray())
                            ->required(),
                        Forms\Components\Hidden::make('user_id')
                            ->default(auth()->id()),
                    ])
                    ->modal(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    BulkAction::make('Ẩn')
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'hide'])),
                    BulkAction::make('Hiện')
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'show'])),

                ]),
            ])
            ->headerActions([
                Action::make('Danh mục')
                    ->label('Danh mục') // Đặt tên nút
                    ->modalHeading('Chỉnh sửa danh mục') // Tiêu đề modal
                    ->modalContent(
                        view('partials.admin_cat_post') // View tạo danh mục
                    )
                    ->modalSubmitAction(false),
            ])
        ;
    }

    public static function getRelations(): array
    {
        return [
            // 'catpost' => RelationManagers\CatpostRelationManager::class,
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
