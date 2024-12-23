<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;

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
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}