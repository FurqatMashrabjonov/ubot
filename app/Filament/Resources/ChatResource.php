<?php

namespace App\Filament\Resources;

use App\Enums\ChatStatusEnum;
use App\Filament\Resources\ChatResource\Pages;
use App\Filament\Resources\ChatResource\RelationManagers;
use App\Models\Chat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                //
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
                Tables\Columns\TextColumn::make('first_name')
                    ->label(__('admin/chat.first_name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label(__('admin/chat.last_name'))
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
                Tables\Columns\TextColumn::make('phone_number')
                    ->label(__('admin/chat.phone_number'))
                    ->searchable()
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
            'index' => Pages\ListChats::route('/'),
            'create' => Pages\CreateChat::route('/create'),
            'edit' => Pages\EditChat::route('/{record}/edit'),
        ];
    }
}
