<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum AlertLevel: string implements HasColor, HasLabel, HasIcon
{
    case Info = 'info';
    case Critical = 'critical';
    case Warning = 'warning';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Info => Color::Blue,
            self::Critical => Color::Red,
            self::Warning => Color::Orange,
            default => Color::Gray,
        };
    }

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Info => 'information',
            self::Critical => 'critical',
            self::Warning => 'warning',
            default => '',
        };
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::Info => Heroicon::InformationCircle,
            self::Critical => Heroicon::ExclamationTriangle,
            self::Warning => Heroicon::ArrowLongUp,
            default => null,
        };
    }
}
