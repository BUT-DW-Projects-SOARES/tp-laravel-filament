<?php

namespace App\Filament\Widgets;

use App\Enums\AlertLevel;
use App\Models\Alert;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Override;

class AlertByLevel extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $alerts = Alert::all()->countBy('level');
        return [
            Stat::make('',  $alerts->get(AlertLevel::Critical->value))
                ->description(AlertLevel::Critical->getLabel())
                ->descriptionIcon(AlertLevel::Critical->getIcon())
                ->descriptionColor(AlertLevel::Critical->getColor()),
            Stat::make('', $alerts->get(AlertLevel::Warning->value))
                ->description(AlertLevel::Warning->getLabel())
                ->descriptionIcon(AlertLevel::Warning->getIcon())
                ->descriptionColor(AlertLevel::Warning->getColor()),
            Stat::make('', $alerts->get(AlertLevel::Info->value))
                ->description(AlertLevel::Info->getLabel())
                ->descriptionIcon(AlertLevel::Info->getIcon())
                ->descriptionColor(AlertLevel::Info->getColor()),
            Stat::make('', $alerts->get(''))
                ->description('unknown'),
        ];
    }

    #[Override]
    protected function getHeading(): ?string
    {
        return 'Alerts by level';
    }
}
