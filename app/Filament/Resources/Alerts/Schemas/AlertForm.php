<?php

namespace App\Filament\Resources\Alerts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class AlertForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                DateTimePicker::make('published_at')
                    ->required()
                    ->native()
                    ->seconds(false),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->relationship(
                        'category',
                        'label',
                        fn(Builder $query) => $query->orderBy('label')
                    ),
            ]);
    }
}
