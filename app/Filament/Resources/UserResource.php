<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $label = 'Nhân sự';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Họ và tên')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Nhập họ và tên')
                    ->unique(ignoreRecord: true)
                    ->columnSpan('full'),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('password')
                    ->label('Mật khẩu')
                    ->required()
                    ->password()
                    ->confirmed()
                    ->placeholder('Nhập mật khẩu'),
                Forms\Components\TextInput::make('password_confirmation')
                    ->label('Xác nhận mật khẩu')
                    ->required()
                    ->password()
                    ->placeholder('Nhập lại mật khẩu'),
                // Forms\Components\CheckboxList::make('roles')
                //     ->label('Vai trò')
                //     ->relationship('roles', 'name')
                //     ->searchable(),
                Forms\Components\Select::make('roles')
                    //Loại bỏ trường hợp super_admin
                    ->label('Vai trò')
                    // ->relationship('roles', 'name')
                    ->relationship('roles', 'name', function (\Illuminate\Database\Eloquent\Builder $query) {
                        $query->where('name', '!=', 'super_admin'); // Loại bỏ super_admin khỏi danh sách
                    })
                    ->searchable()
                    ->multiple(false) // Không cho phép chọn nhiều role
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Họ và tên')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Vai trò')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
