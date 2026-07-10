<?php

namespace App\Filament\Widgets;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class RecentActivities extends TableWidget
{
    protected static ?string $heading = 'Aktivitas Terbaru';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public array $activities = [];

    public function mount(): void
    {
        $projectActivities = Project::latest()
            ->take(5)
            ->get()
            ->map(function ($project) {
                return [
                    'type' => 'Project',
                    'title' => $project->title ?? $project->name ?? 'Project',
                    'description' => 'Project baru ditambahkan',
                    'date' => $project->created_at,
                ];
            });

        $skillActivities = Skill::latest()
            ->take(5)
            ->get()
            ->map(function ($skill) {
                return [
                    'type' => 'Skill',
                    'title' => $skill->name ?? $skill->title ?? 'Skill',
                    'description' => 'Skill baru ditambahkan',
                    'date' => $skill->created_at,
                ];
            });

        $experienceActivities = Experience::latest()
            ->take(5)
            ->get()
            ->map(function ($experience) {
                return [
                    'type' => 'Experience',
                    'title' => $experience->title
                        ?? $experience->position
                        ?? $experience->company_name
                        ?? 'Experience',
                    'description' => 'Experience baru ditambahkan',
                    'date' => $experience->created_at,
                ];
            });

        $certificateActivities = Certificate::latest()
            ->take(5)
            ->get()
            ->map(function ($certificate) {
                return [
                    'type' => 'Certificate',
                    'title' => $certificate->name ?? $certificate->title ?? 'Certificate',
                    'description' => 'Sertifikat baru ditambahkan',
                    'date' => $certificate->created_at,
                ];
            });

        $this->activities = collect()
            ->merge($projectActivities)
            ->merge($skillActivities)
            ->merge($experienceActivities)
            ->merge($certificateActivities)
            ->sortByDesc('date')
            ->take(8)
            ->values()
            ->map(function ($item, $index) {
                return [
                    'id' => $index + 1,
                    'type' => $item['type'],
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'date' => $item['date'],
                ];
            })
            ->toArray();
    }

    public function table(Table $table): Table
    {
        return $table
            ->records(fn(): Collection => collect($this->activities))
            ->paginated(false)
            ->striped()
            ->emptyStateHeading('Belum ada aktivitas')
            ->emptyStateDescription('Aktivitas terbaru dari project, skill, experience, dan certificate akan muncul di sini.')
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Project' => 'primary',
                        'Skill' => 'success',
                        'Experience' => 'warning',
                        'Certificate' => 'info',
                        default => 'gray',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'Project' => 'heroicon-o-folder',
                        'Skill' => 'heroicon-o-light-bulb',
                        'Experience' => 'heroicon-o-briefcase',
                        'Certificate' => 'heroicon-o-academic-cap',
                        default => 'heroicon-o-document',
                    }),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul / Nama')
                    ->searchable()
                    ->weight('semibold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Keterangan')
                    ->formatStateUsing(fn(?string $state) => Str::limit($state ?? '-', 50))
                    ->wrap(),

                Tables\Columns\TextColumn::make('date')
                    ->label('Tanggal')
                    ->formatStateUsing(function ($state) {
                        if (!$state) {
                            return '-';
                        }

                        return Carbon::parse($state)->translatedFormat('d M Y, H:i');
                    })
                    ->description(function ($state) {
                        if (!$state) {
                            return null;
                        }

                        return Carbon::parse($state)->diffForHumans();
                    })
                    ->sortable(),
            ]);
    }
}