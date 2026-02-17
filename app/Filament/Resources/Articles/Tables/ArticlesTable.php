<?php

namespace App\Filament\Resources\Articles\Tables;

use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;


class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('preview_image')
                    ->disk('public')
                    ->square()
                    ->size(60),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->weight('bold'),

                TextColumn::make('slug')
                    ->toggleable()
                    ->color('gray'),

                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Активна')
                    ->trueColor('success')
                    ->falseColor('danger'),

                TextColumn::make('created_at')
                    ->date('d.m.Y')
                    ->sortable()
                    ->label('Дата'),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Статус'),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
