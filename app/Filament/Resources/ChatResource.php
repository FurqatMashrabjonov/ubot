<?php

namespace App\Filament\Resources;

use App\Enums\ChatStatusEnum;
use App\Filament\Resources\ChatResource\Pages;
use App\Filament\Resources\ChatResource\RelationManagers;
use App\Models\Chat;
use App\Models\ChatProduct;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChatResource extends Resource
{
    protected static ?string $model = Chat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('chat.product')
                    ->label(__('admin/chat.product'))
                    ->options(fn() => \App\Models\Product::pluck('name', 'id'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('chat_id')
                    ->label(__('admin/chat.chat_id'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('username')
                    ->label(__('admin/chat.username'))
                    ->searchable()
                    ->sortable(),

            //make full name
                Tables\Columns\TextColumn::make('full_name')
                    ->label(__('admin/chat.full_name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label(__('admin/chat.status'))
                    ->badge()
                    ->searchable()
                    ->sortable()
                    ->color(fn(Chat $record) => ChatStatusEnum::getColors()[$record->status] ?? 'default'),
                Tables\Columns\TextColumn::make('language_code')
                    ->label(__('admin/chat.language_code'))
                    ->searchable()
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product.name')
                    ->label(__('admin/chat.product'))
                    ->searchable()
                    ->sortable(),
//                Tables\Columns\TextColumn::make('phone_number')
//                    ->label(__('admin/chat.phone_number'))
//                    ->searchable()
//                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('updateChat')
                        ->fillForm(fn(Chat $chat): array => [
                            'chat_id' => $chat->id,
                        ])
                        ->form([
                            Select::make('product_id')
                                ->label(__('admin/chat.product'))
                                ->options(Product::query()->pluck('name', 'id'))
                                ->required(),
                        ])
                        ->action(function (array $data, Chat $chat): void {
                            ChatProduct::query()->updateOrCreate([
                                'chat_id' => $chat->id,
                            ], [
                               'product_id' => $data['product_id'],
                            ]);
                        }),
                    Tables\Actions\EditAction::make(),
                ])
                    ->label(__('admin/chat.actions'))
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->size(ActionSize::Small)
                    ->color('primary')
                    ->button()
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
            'index' => Pages\ListChats::route('/'),
            'create' => Pages\CreateChat::route('/create'),
            'edit' => Pages\EditChat::route('/{record}/edit'),
        ];
    }
}
