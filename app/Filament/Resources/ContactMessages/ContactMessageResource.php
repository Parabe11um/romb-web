<?php

namespace App\Filament\Resources\ContactMessages;

use App\Filament\Resources\ContactMessages\Pages\ListContactMessages;
use App\Models\ContactMessage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $navigationLabel = 'Сообщения';

    protected static ?string $modelLabel = 'Сообщение';

    protected static ?string $pluralModelLabel = 'Сообщения';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            \Filament\Forms\Components\TextInput::make('name')
                ->label('Имя')
                ->disabled(),

            \Filament\Forms\Components\TextInput::make('email')
                ->label('Email')
                ->disabled(),

            \Filament\Forms\Components\TextInput::make('ip_address')
                ->label('IP')
                ->disabled(),

            \Filament\Forms\Components\Textarea::make('message')
                ->label('Сообщение')
                ->rows(6)
                ->disabled(),

            \Filament\Forms\Components\Toggle::make('policy_accepted')
                ->label('Согласие с политикой')
                ->disabled(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),

                \Filament\Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                \Filament\Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP'),

                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                \Filament\Actions\ViewAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContactMessages::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
