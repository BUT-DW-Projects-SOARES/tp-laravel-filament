<?php

namespace App\Filament\Resources\Alerts\Tables;

use App\Enums\AlertLevel;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AlertsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('filament/resources/alert.fields.title'))
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                TextColumn::make('published_at')
                    ->label(__('filament/resources/alert.fields.published_at'))
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('level')
                    ->label(__('filament/resources/alert.fields.level'))
                    ->badge()
                    ->sortable(),
                TextColumn::make('category.label')
                    ->label(__('filament/resources/alert.fields.category'))
                    ->sortable()
                    ->wrap(),
                TextColumn::make('tags.label')
                    ->label(__('filament/resources/alert.fields.tags'))
                    ->badge(),
            ])
            ->filters([
                SelectFilter::make('level')
                    ->options(AlertLevel::class),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
    }
}
