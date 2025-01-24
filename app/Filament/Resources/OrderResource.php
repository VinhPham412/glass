<?php
	
	namespace App\Filament\Resources;
	
	use App\Filament\Resources\OrderResource\Pages;
	use App\Filament\Resources\OrderResource\RelationManagers;
	use App\Models\Order;
	use App\Models\Product;
	use App\Models\Version;
	use Filament\Forms;
	use Filament\Forms\Form;
	use Filament\Resources\Resource;
	use Filament\Support\RawJs;
	use Filament\Tables;
	use Filament\Tables\Table;
	use Illuminate\Database\Eloquent\Builder;
	use Illuminate\Database\Eloquent\SoftDeletingScope;
	use Filament\Notifications\Notification;
	use Illuminate\Support\Facades\DB;
	
	class OrderResource extends Resource {
		protected static ?string $model = Order::class;
		
		protected static ?string $label = "Đơn hàng";
		
		protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
		
		public static function form(Form $form): Form {
			return $form
				->schema([
					Forms\Components\Select::make('customer_id')
						->relationship('customer', 'name')
						->label('Khách hàng')
						->searchable()
						->required()
						->disabled(),
					Forms\Components\Select::make('status')
						->options(['pending' => 'Đang chờ', 'done' => 'Đã xong', 'cancel' => 'Đã hủy',])
						->label('Trạng thái đơn hàng')
						->required()
					,
					Forms\Components\Repeater::make('orderItems')
						->label('Sản phẩm trong đơn hàng')
						->columnSpanFull()
						->relationship()
						->collapsed()
						->columns(5)
						->itemLabel(function (array $state): ?string {
							$version = Version::find($state['version_id'] ?? null);
							return $version
								? "{$version->product->name} - Size: {$version->size} - Color: {$version->color} - Còn tồn: {$version->stock}"
								: null;
						})
						->addActionLabel('Thêm sản phẩm')
						->addable(false)
						->deletable(false)
						->schema([
							Forms\Components\Hidden::make('version_id'),
							Forms\Components\Select::make('version.color')
								->relationship('version', 'color')
								->disabled(),
							Forms\Components\Select::make('version.size')
								->relationship('version', 'size')
								->disabled(),
							Forms\Components\TextInput::make('quantity')
								->label('Số lượng')
								->numeric()
								->minValue(1)
								->disabled()
								->required(),
							Forms\Components\TextInput::make('price')
								->label('Giá (vnd)')
								->numeric()
								->disabled(),
							Forms\Components\FileUpload::make('image')
								->label('Ảnh')
								->imagePreviewHeight('50px')
								->disabled(),
						])
				]);
		}
		
		public static function table(Table $table): Table {
			return $table
				->columns([
					Tables\Columns\TextColumn::make('customer.name')
						->label('Khách hàng')
						->sortable(),
					Tables\Columns\TextColumn::make('status')
						->label('Trạng thái')
						->formatStateUsing(function (string $state): string {
							return match ($state) {
								'pending' => 'Đang chờ',
								'done' => 'Đã xong',
								'cancel' => 'Đã hủy',
								default => $state,
							};
						})
						->sortable()
						->searchable(),
					Tables\Columns\TextColumn::make('order_items_count')
						->label('Sản phẩm khác nhau')
						->counts('orderItems'),
					Tables\Columns\TextColumn::make('order_items_sum_quantity')
						->label('Tổng sản phẩm đặt')
						->sum('orderItems', 'quantity'),
					Tables\Columns\TextColumn::make('order_items_sum_price')
						->label('Tổng tiền')
						->formatStateUsing(function (string $state): string {
							return number_format($state, 0, '.', ',') . 'đ';
						})
						->sum('orderItems', 'price'),
					Tables\Columns\TextColumn::make('created_at')
						->label('Thời gian tạo')
						->formatStateUsing(function (string $state): string {
							return date('d-m-Y H:i', strtotime($state));
						})
						->sortable()
				
				
				])
				->filters([//
				])
				->actions([
					Tables\Actions\EditAction::make(),])
				->bulkActions([
					Tables\Actions\BulkActionGroup::make([
						Tables\Actions\DeleteBulkAction::make(),]),]);
		}
		
		public static function getRelations(): array {
			return [//
			];
		}
		
		public static function getPages(): array {
			return [
				'index' => Pages\ListOrders::route('/'),
				'create' => Pages\CreateOrder::route('/create'),
				'edit' => Pages\EditOrder::route('/{record}/edit'),];
		}
		
		public static function getNavigationBadge(): ?string {
			return static::getModel()::count();
		}
		
	}
