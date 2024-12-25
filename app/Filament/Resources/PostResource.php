<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Filters;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Collection;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    // đổi tên model từ PostResource thành Bài viết
    public static ?string $label = 'Bài viết';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Tiêu đề')
                    ->required()
                    ->placeholder('Nhập tiêu đề bài viết')
                    ->maxlength(255),
                // thêm trường thumbnail là trường file 
                Forms\Components\FileUpload::make('thumbnail'),
                // thêm trường mô tả là trường rich editor
                RichEditor::make('content')
                    ->label('Nội dung')
                    ->required()
                    ->columnSpan('full'),
                // Thêm trường select để chọn ẩn/hiện bài viết 
                Forms\Components\Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'show' => 'Hiện',
                        'hide' => 'Ẩn',
                    ])
                    ->required()
            ]);
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
                    ->formatStateUsing(fn(string $state): string => $state === 'show' ? 'Hiện' : 'Ẩn'),
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
                    ),
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
                // thêm action xem chi tiết
                Tables\Actions\EditAction::make(),
                // thêm action xóa
                Tables\Actions\DeleteAction::make(),
                // Thêm action ẩn
                Action::make('Ẩn/Hiện')
                    ->action(fn(Post $record) => $record->update(['status' => $record->status === 'show' ? 'hide' : 'show']))

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    BulkAction::make('Ẩn')
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'hide'])),
                    BulkAction::make('Hiện')
                        ->action(fn(Collection $records) => $records->each->update(['status' => 'show'])),

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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
