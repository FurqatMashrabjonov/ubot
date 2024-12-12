<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make(__('admin/products.tabs.upload_image'))
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->imageEditor(),
                            ]),
                        Tabs\Tab::make(__('admin/products.tabs.descripitions'))
                            ->schema([
                                Forms\Components\MarkdownEditor::make('description')
                                    ->label(__('admin/products.description'))
                                    ->required(),
                                Forms\Components\Textarea::make('short_description')
                                    ->label(__('admin/products.short_description'))
                                    ->required(),
                            ]),
                        Tabs\Tab::make(__('admin/products.tabs.details'))
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('admin/products.name'))
                                    ->required(),
                                Forms\Components\Select::make('category_id')
                                    ->label(__('admin/products.category'))
                                    ->options(fn() => \App\Models\Category::pluck('name', 'id'))
                                    ->required(),
                                Forms\Components\Select::make('status')
                                    ->label(__('admin/products.status'))
                                    ->options([
                                        'active' => 'Active',
                                        'inactive' => 'Inactive',
                                    ])
                                    ->required(),
                                Forms\Components\Toggle::make('is_default')
                                    ->label(__('admin/products.is_default'))
                                    ->default(false),
                            ]),
                    ]),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                ->label(__('admin/products.image'))
                ->extraImgAttributes(['loading' => 'lazy'])
                ->size(100),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('admin/products.name'))
                    ->searchable()
                    ->sortable(),
//                Tables\Columns\TextColumn::make('description')
//                    ->label(__('admin/products.description'))
//                    ->wrap()
//                    ->lineClamp(2)
//                    ->searchable()
//                    ->sortable(),
            Tables\Columns\TextColumn::make('module_name')
            ->label(__('admin/products.module_name'))
            ->searchable()
            ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label(__('admin/products.category'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('admin/products.status'))
                    ->badge()
                    ->color(fn($record) => match ($record->status) {
                        'active' => 'success',
                        'inactive' => 'danger',
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_default')
                    ->label(__('admin/products.is_default'))
                    ->sortable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
