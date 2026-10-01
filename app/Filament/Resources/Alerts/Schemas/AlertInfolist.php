<?php

namespace App\Filament\Resources\Alerts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AlertInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label(__('filament/resources/alert.fields.title')),
                TextEntry::make('published_at')
                    ->label(__('filament/resources/alert.fields.published_at'))
                    ->isoDateTime('L HH:mm'),
                TextEntry::make('description')
                    ->label(__('filament/resources/alert.fields.description'))
                    ->columnSpanFull(),
                TextEntry::make('category.label')
                    ->label(__('filament/resources/alert.fields.category')),
                TextEntry::make('tags.label')
                    ->label(__('filament/resources/alert.fields.tags'))
                    ->badge(),
                TextEntry::make('level')
                    ->label(__('filament/resources/alert.fields.level'))
                    ->badge(),
            ]);
    }
}
