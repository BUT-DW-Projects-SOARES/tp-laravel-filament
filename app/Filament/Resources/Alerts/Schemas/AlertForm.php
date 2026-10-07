<?php

namespace App\Filament\Resources\Alerts\Schemas;

use App\Enums\AlertLevel;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class AlertForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__('filament/resources/alert.fields.title'))
                    ->required(),
                DateTimePicker::make('published_at')
                    ->label(__('filament/resources/alert.fields.published_at'))
                    ->required()
                    ->native()
                    ->seconds(false),
                Textarea::make('description')
                    ->label(__('filament/resources/alert.fields.description'))
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->label(__('filament/resources/alert.fields.category'))
                    ->relationship(
                        'category',
                        'label',
                        fn(Builder $query) => $query->orderBy('label')
                    ),
                Select::make('tags')
                    ->label(__('filament/resources/alert.fields.tags'))
                    ->relationship('tags', 'label', fn(Builder $query) => $query->orderBy('label'))
                    ->multiple()
                    ->preload(),
                ToggleButtons::make('level')
                    ->label(__('filament/resources/alert.fields.level'))
                    ->options(AlertLevel::class)
                    ->inline(),
            ]);
    }
}
