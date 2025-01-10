<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionResource\Pages;
use App\Filament\Resources\PromotionResource\RelationManagers;
use App\Models\Promotion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Carbon;

class PromotionResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $label = 'Khuyến mãi';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Tên chương trình khuyến mãi')
                    ->required()
                    ->placeholder('Nhập tên chương trình khuyến mãi')
                    ->maxlength(255),
                Forms\Components\MarkdownEditor::make('description')
                    ->label('Mô tả')
                    ->required()
                    ->placeholder('Nhập mô tả chương trình khuyến mãi'),
                Forms\Components\TextInput::make('code')
                    ->label('Mã khuyến mãi')
                    ->required()
                    ->placeholder('Nhập mã khuyến mãi')
                    ->maxlength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\Select::make('type')
                    ->label('Loại khuyến mãi')
                    ->required()
                    ->options([
                        'percentage' => 'Phần trăm',
                        'fixed' => 'Số tiền',
                    ])
                    ->reactive()
                    ->afterStateUpdated(function (Set $set) {
                        $set('value', null);
                    }),
                Forms\Components\TextInput::make('value')
                    ->label('Giá trị')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->inputMode('decimal')
                    ->mask(RawJs::make('$money($input)'))
                    ->maxValue(fn (Get $get) => $get('type') === 'percentage' ? 99 : null)
                    ->step(fn (Get $get) => $get('type') === 'percentage' ? 1 : 1000)
                    ->suffix(fn (Get $get) => $get('type') === 'percentage' ? '%' : ' VNĐ')
                    ->placeholder(fn (Get $get) => $get('type') === 'percentage' ? 'Nhập % khuyến mãi' : 'Nhập số tiền khuyến mãi'),
                Forms\Components\DateTimePicker::make('start_date')
                    ->label('Ngày bắt đầu')
                    ->required()
                    ->minDate(now()->addMinutes(1)) // Đảm bảo ngày bắt đầu ít nhất sau thời điểm hiện tại
                    ->reactive(),
                Forms\Components\DateTimePicker::make('end_date')
                    ->label('Ngày kết thúc')
                    ->required()
                    ->minDate(fn (Get $get): Carbon => Carbon::parse($get('start_date'))->addDay()) // Đảm bảo ngày kết thúc sau ngày bắt đầu ít nhất 1 ngày
                    ->afterOrEqual('start_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên chương trình khuyến mãi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã khuyến mãi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Loại khuyến mãi')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'percentage' => 'Phần trăm',
                            'fixed' => 'Giảm theo số tiền',
                            default => $state,
                        };
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Giá trị')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Ngày bắt đầu')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                
                    ->color(function (Promotion $record): string {
                        return $record->start_date && Carbon::parse($record->start_date)->isPast()
                            ? 'success'
                            : 'warning';
                    }),
                
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Ngày kết thúc')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->searchable()
                    ->toggleable()

                    ->color(function (Promotion $record): string {
                        return $record->end_date && Carbon::parse($record->end_date)->isPast()
                            ? 'danger'
                            : 'success';
                    }),
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
            'index' => Pages\ListPromotions::route('/'),
            'create' => Pages\CreatePromotion::route('/create'),
            'edit' => Pages\EditPromotion::route('/{record}/edit'),
        ];
    }
}
