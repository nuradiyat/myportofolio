<?php

namespace App\Filament\Widgets;

use App\Models\WebsiteVisitor;
use Filament\Widgets\ChartWidget;

class VisitorChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Pengunjung Website';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public ?string $filter = 'weekly';

    protected function getFilters(): ?array
    {
        return [
            'weekly' => 'Mingguan',
            'monthly' => 'Bulanan',
            'yearly' => 'Tahunan',
        ];
    }

    protected function getData(): array
    {
        return match ($this->filter) {
            'monthly' => $this->getMonthlyChartData(),
            'yearly' => $this->getYearlyChartData(),
            default => $this->getWeeklyChartData(),
        };
    }

    protected function getWeeklyChartData(): array
    {
        $stats = WebsiteVisitor::selectRaw('visit_date as date, COUNT(*) as total')
            ->whereDate('visit_date', '>=', now()->subDays(6)->toDateString())
            ->groupBy('visit_date')
            ->orderBy('visit_date')
            ->get()
            ->keyBy('date');

        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $formatted = $date->format('Y-m-d');

            $labels[] = $date->translatedFormat('d M');
            $data[] = $stats[$formatted]->total ?? 0;
        }

        return $this->formatChartData($labels, $data);
    }

    protected function getMonthlyChartData(): array
    {
        $stats = WebsiteVisitor::selectRaw('visit_date as date, COUNT(*) as total')
            ->whereDate('visit_date', '>=', now()->subDays(29)->toDateString())
            ->groupBy('visit_date')
            ->orderBy('visit_date')
            ->get()
            ->keyBy('date');

        $labels = [];
        $data = [];

        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $formatted = $date->format('Y-m-d');

            $labels[] = $date->translatedFormat('d M');
            $data[] = $stats[$formatted]->total ?? 0;
        }

        return $this->formatChartData($labels, $data);
    }

    protected function getYearlyChartData(): array
    {
        $start = now()->startOfMonth()->subMonths(11);

        $stats = WebsiteVisitor::selectRaw('YEAR(visit_date) as year, MONTH(visit_date) as month, COUNT(*) as total')
            ->whereDate('visit_date', '>=', $start->toDateString())
            ->groupByRaw('YEAR(visit_date), MONTH(visit_date)')
            ->orderByRaw('YEAR(visit_date), MONTH(visit_date)')
            ->get()
            ->keyBy(fn($item) => $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT));

        $labels = [];
        $data = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->startOfMonth()->subMonths($i);
            $key = $date->format('Y-m');

            $labels[] = $date->translatedFormat('M Y');
            $data[] = $stats[$key]->total ?? 0;
        }

        return $this->formatChartData($labels, $data);
    }

    protected function formatChartData(array $labels, array $data): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Visitors',
                    'data' => $data,
                    'fill' => true,
                    'tension' => 0.4,
                    'borderWidth' => 3,
                    'pointRadius' => 4,
                    'pointHoverRadius' => 7,
                    'pointHitRadius' => 20,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public function getDescription(): ?string
    {
        $today = WebsiteVisitor::whereDate('visit_date', today())->count();

        $thisWeek = WebsiteVisitor::whereBetween('visit_date', [
            now()->startOfWeek()->toDateString(),
            now()->endOfWeek()->toDateString(),
        ])->count();

        $thisMonth = WebsiteVisitor::whereMonth('visit_date', now()->month)
            ->whereYear('visit_date', now()->year)
            ->count();

        $total = WebsiteVisitor::count();

        return "Hari ini: {$today} • Minggu ini: {$thisWeek} • Bulan ini: {$thisMonth} • Total: {$total}";
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'interaction' => [
                'mode' => 'index',
                'intersect' => false,
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'enabled' => true,
                    'mode' => 'index',
                    'intersect' => false,
                    'displayColors' => false,
                    'padding' => 12,
                ],
            ],
            'hover' => [
                'mode' => 'nearest',
                'intersect' => false,
            ],
            'animations' => [
                'tension' => [
                    'duration' => 700,
                    'easing' => 'easeOutQuart',
                    'from' => 0.2,
                    'to' => 0.4,
                    'loop' => false,
                ],
            ],
            'elements' => [
                'line' => [
                    'borderJoinStyle' => 'round',
                ],
                'point' => [
                    'hoverRadius' => 8,
                    'radius' => 4,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                    ],
                    'grid' => [
                        'display' => true,
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }

    protected function getMaxHeight(): ?string
    {
        return '340px';
    }
}