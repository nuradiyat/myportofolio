<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Project')
                    ->description('Detail lengkap project yang ditampilkan pada website portofolio.')
                    ->schema([
                        ImageEntry::make('thumbnail')
                            ->label('Thumbnail')
                            ->disk('public')
                            ->columnSpanFull(),

                        TextEntry::make('title')
                            ->label('Judul Project')
                            ->weight('bold'),

                        TextEntry::make('slug')
                            ->label('Slug')
                            ->copyable(),

                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->formatStateUsing(fn (?string $state): string => match ($state) {
                                'ongoing' => 'Ongoing',
                                'completed' => 'Completed',
                                'maintenance' => 'Maintenance',
                                'archived' => 'Archived',
                                default => ucfirst((string) $state),
                            })
                            ->color(fn (?string $state): string => match ($state) {
                                'ongoing' => 'warning',
                                'completed' => 'success',
                                'maintenance' => 'info',
                                'archived' => 'gray',
                                default => 'gray',
                            }),

                        TextEntry::make('skills.name')
                            ->label('Skill / Teknologi')
                            ->badge()
                            ->separator(','),

                        TextEntry::make('short_description')
                            ->label('Deskripsi Singkat')
                            ->columnSpanFull()
                            ->placeholder('Belum ada deskripsi singkat.'),

                        TextEntry::make('description')
                            ->label('Deskripsi Lengkap')
                            ->html()
                            ->columnSpanFull()
                            ->placeholder('Belum ada deskripsi lengkap.'),

                        TextEntry::make('objective')
                            ->label('Tujuan Project')
                            ->columnSpanFull()
                            ->placeholder('Belum ada tujuan project.'),

                        TextEntry::make('github_url')
                            ->label('GitHub URL')
                            ->url(fn (?string $state): ?string => filled($state) ? $state : null)
                            ->openUrlInNewTab()
                            ->placeholder('Tidak ada link GitHub.'),

                        TextEntry::make('demo_url')
                            ->label('Demo URL')
                            ->url(fn (?string $state): ?string => filled($state) ? $state : null)
                            ->openUrlInNewTab()
                            ->placeholder('Tidak ada link demo.'),

                        TextEntry::make('start_date')
                            ->label('Tanggal Mulai')
                            ->date('d M Y')
                            ->placeholder('-'),

                        TextEntry::make('end_date')
                            ->label('Tanggal Selesai')
                            ->date('d M Y')
                            ->placeholder('Masih berjalan'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                ComponentsSection::make('Fitur Project')
                    ->description('Daftar fitur utama yang dimiliki project.')
                    ->schema([
                        RepeatableEntry::make('features')
                            ->label('')
                            ->state(fn ($record) => collect($record->features ?? [])
                                ->map(fn ($item) => [
                                    'value' => $item,
                                ])
                                ->toArray())
                            ->schema([
                                TextEntry::make('value')
                                    ->label('Fitur'),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->visible(fn ($record): bool => filled($record?->features)),
            ]);
    }
}
