<?php

namespace App\Filament\Widgets;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\WebsiteVisitor;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PortfolioStats extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $projectCount = Project::count();
        $skillCount = Skill::count();
        $experienceCount = Experience::count();
        $certificateCount = Certificate::count();

        $visitorToday = WebsiteVisitor::whereDate('visit_date', today())->count();
        $totalVisitors = WebsiteVisitor::count();

        return [
            Stat::make('Total Projects', $projectCount)
                ->description('Jumlah project di portfolio')
                ->descriptionIcon(Heroicon::OutlinedFolder)
                ->icon(Heroicon::OutlinedFolder)
                ->color('primary'),

            Stat::make('Total Skills', $skillCount)
                ->description('Jumlah skill yang ditampilkan')
                ->descriptionIcon(Heroicon::OutlinedCpuChip)
                ->icon(Heroicon::OutlinedCpuChip)
                ->color('success'),

            Stat::make('Total Experiences', $experienceCount)
                ->description('Pengalaman organisasi / kerja / magang')
                ->descriptionIcon(Heroicon::OutlinedBriefcase)
                ->icon(Heroicon::OutlinedBriefcase)
                ->color('warning'),

            Stat::make('Total Certificates', $certificateCount)
                ->description('Jumlah sertifikat')
                ->descriptionIcon(Heroicon::OutlinedAcademicCap)
                ->icon(Heroicon::OutlinedAcademicCap)
                ->color('info'),

            Stat::make('Visitors Today', $visitorToday)
                ->description('Pengunjung unik hari ini')
                ->descriptionIcon(Heroicon::OutlinedEye)
                ->icon(Heroicon::OutlinedEye)
                ->color('success'),

            Stat::make('Total Visitors', $totalVisitors)
                ->description('Total visitor website')
                ->descriptionIcon(Heroicon::OutlinedChartBar)
                ->icon(Heroicon::OutlinedChartBar)
                ->color('yellow'),
        ];
    }
}