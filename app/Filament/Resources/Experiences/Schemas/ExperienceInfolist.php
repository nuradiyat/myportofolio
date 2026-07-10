<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Carbon\Carbon;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class ExperienceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Detail Pengalaman')
                    ->description('Informasi lengkap pengalaman yang ditampilkan pada website portofolio.')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Logo / Gambar Pengalaman')
                            ->disk('public')
                            ->defaultImageUrl('https://placehold.co/300x300/e2e8f0/64748b?text=Experience')
                            ->columnSpanFull(),

                        TextEntry::make('organization')
                            ->label('Organisasi / Perusahaan / Instansi')
                            ->weight('bold'),

                        TextEntry::make('position')
                            ->label('Posisi / Jabatan')
                            ->weight('medium'),

                        TextEntry::make('type')
                            ->label('Tipe Pengalaman')
                            ->badge()
                            ->color('primary'),

                        TextEntry::make('start_date')
                            ->label('Tanggal Mulai')
                            ->date('d F Y'),

                        TextEntry::make('end_date')
                            ->label('Tanggal Selesai')
                            ->formatStateUsing(
                                fn($state): string => $state
                                    ? Carbon::parse($state)->translatedFormat('d F Y')
                                    : 'Sekarang'
                            ),

                        TextEntry::make('description')
                            ->label('Deskripsi Pengalaman')
                            ->columnSpanFull()
                            ->html()
                            ->formatStateUsing(
                                fn(?string $state): string => filled($state)
                                    ? nl2br(e($state))
                                    : '-'
                            ),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
