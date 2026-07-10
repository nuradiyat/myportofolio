<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProfileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Ringkasan Profil')
                    ->description('Informasi utama profil yang tampil pada website portofolio.')
                    ->schema([
                        ImageEntry::make('profile_photo')
                            ->label('Foto Profil')
                            ->disk('public')
                            ->circular()
                            ->defaultImageUrl('https://placehold.co/300x300/e2e8f0/64748b?text=No+Photo')
                            ->columnSpan(1),

                        ImageEntry::make('logo_website')
                            ->label('Logo Website')
                            ->disk('public')
                            ->circular()
                            ->defaultImageUrl('https://placehold.co/300x300/e2e8f0/64748b?text=No+Logo')
                            ->columnSpan(1),

                        TextEntry::make('full_name')
                            ->label('Nama Lengkap')
                            ->weight('bold'),

                        TextEntry::make('profession')
                            ->label('Profesi / Jabatan')
                            ->badge()
                            ->color('primary'),  

                        TextEntry::make('cv_file')
                            ->label('File CV')
                            ->formatStateUsing(
                                fn(?string $state): string => filled($state) ? 'CV tersedia' : 'Tidak ada file CV'
                            )
                            ->badge()
                            ->color(
                                fn(?string $state): string => filled($state) ? 'success' : 'gray'
                            ),
                    ])
                    ->columns(2),

                Section::make('Detail Profil')
                    ->description('Deskripsi lengkap profil yang akan dibaca pengunjung website.')
                    ->schema([
                        TextEntry::make('short_bio')
                            ->label('Bio Singkat')
                            ->placeholder('Belum ada bio singkat.')
                            ->columnSpanFull(),

                        TextEntry::make('about')
                            ->label('Tentang Saya')
                            ->html()
                            ->placeholder('Belum ada deskripsi tentang profil.')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }
}
