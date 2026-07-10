<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SkillInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Skill')
                    ->description('Informasi detail skill yang ditampilkan pada website portofolio.')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama Skill')
                            ->weight('bold'),

                        TextEntry::make('category')
                            ->label('Kategori')
                            ->badge()
                            ->color('primary'),

                        TextEntry::make('icon')
                            ->label('Icon')
                            ->placeholder('Belum ada icon')
                            ->columnSpanFull()
                            ->copyable()
                            ->copyMessage('Icon berhasil disalin'),

                        TextEntry::make('projects_count')
                            ->label('Digunakan di Project')
                            ->state(fn($record): int => $record->projects()->count())
                            ->badge()
                            ->color('success'),

                        TextEntry::make('created_at')
                            ->label('Dibuat')
                            ->dateTime('d M Y H:i'),

                        TextEntry::make('updated_at')
                            ->label('Terakhir Diubah')
                            ->dateTime('d M Y H:i'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
