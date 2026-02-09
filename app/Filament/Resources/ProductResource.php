<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cube';
    protected static string | \UnitEnum | null $navigationGroup = 'Produk';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Schemas\Components\Section::make('Informasi Produk')->schema([
                Forms\Components\Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('name')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Schemas\Components\Utilities\Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->directory('products'),
            ])->columns(2),

            Schemas\Components\Section::make('Harga & Stok')->schema([
                Forms\Components\TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->default(0),
                Forms\Components\TextInput::make('min_order')
                    ->label('Minimal Order')
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('unit')
                    ->label('Satuan')
                    ->default('pcs')
                    ->maxLength(50),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Produk Unggulan')
                    ->helperText('Tampilkan di halaman beranda')
                    ->default(false),
            ])->columns(2),

            Schemas\Components\Section::make('Spesifikasi')->schema([
                Forms\Components\KeyValue::make('specifications')
                    ->label('Spesifikasi Produk')
                    ->keyLabel('Spesifikasi')
                    ->valueLabel('Detail'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Gambar')->circular(),
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Kategori')->sortable(),
                Tables\Columns\TextColumn::make('price')->label('Harga')->money('IDR')->sortable(),
                Tables\Columns\TextColumn::make('min_order')->label('Min. Order'),
                Tables\Columns\TextColumn::make('unit')->label('Satuan'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Aktif'),
                Tables\Columns\ToggleColumn::make('is_featured')->label('Unggulan'),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
                Tables\Filters\TernaryFilter::make('is_active')->label('Aktif'),
                Tables\Filters\TernaryFilter::make('is_featured')->label('Unggulan'),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\BulkAction::make('set_featured')
                        ->label('Set Unggulan')
                        ->icon('heroicon-o-star')
                        ->action(fn (\Illuminate\Database\Eloquent\Collection $records) => $records->each(fn ($record) => $record->update(['is_featured' => true])))
                        ->deselectRecordsAfterCompletion()
                        ->requiresConfirmation()
                        ->modalHeading('Set Produk Unggulan')
                        ->modalDescription('Produk yang dipilih akan ditampilkan di halaman beranda.')
                        ->successNotificationTitle('Produk berhasil diset sebagai unggulan'),
                    Actions\BulkAction::make('unset_featured')
                        ->label('Hapus dari Unggulan')
                        ->icon('heroicon-o-x-mark')
                        ->color('gray')
                        ->action(fn (\Illuminate\Database\Eloquent\Collection $records) => $records->each(fn ($record) => $record->update(['is_featured' => false])))
                        ->deselectRecordsAfterCompletion()
                        ->requiresConfirmation()
                        ->modalHeading('Hapus dari Unggulan')
                        ->modalDescription('Produk yang dipilih tidak akan ditampilkan di halaman beranda.')
                        ->successNotificationTitle('Produk berhasil dihapus dari unggulan'),
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
