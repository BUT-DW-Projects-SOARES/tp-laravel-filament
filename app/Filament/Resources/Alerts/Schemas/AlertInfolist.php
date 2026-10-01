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
                    ->label('Label'),
                TextEntry::make('published_at')
                    ->dateTime()
                    ->label('Published at'),
                TextEntry::make('description')
                    ->label('Description')
                    ->columnSpanFull(),
                TextEntry::make('category.label')
                    ->label('Category'),
                TextEntry::make('tags.label')
                    ->label('Tags')
                    ->badge(),
                TextEntry::make('level')
                    ->label('Level')
                    ->badge(),
            ]);
    }
}
