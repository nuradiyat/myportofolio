<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CertificateInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Sertifikat')
                    ->description('Informasi lengkap sertifikat yang ditampilkan pada portofolio.')
                    ->schema([
                        TextEntry::make('title')
                            ->label('Judul Sertifikat')
                            ->weight('bold'),

                        TextEntry::make('issuer')
                            ->label('Penerbit / Penyelenggara')
                            ->badge()
                            ->color('primary'),

                        TextEntry::make('certificate_number')
                            ->label('Nomor Sertifikat')
                            ->placeholder('-'),

                        TextEntry::make('issue_year')
                            ->label('Tahun Terbit')
                            ->placeholder('-'),

                        TextEntry::make('expired_at')
                            ->label('Tanggal Kedaluwarsa')
                            ->date('d M Y')
                            ->placeholder('Tidak ada masa berlaku'),

                        TextEntry::make('credential_url')
                            ->label('Credential URL')
                            ->url(fn($record) => $record->credential_url)
                            ->openUrlInNewTab()
                            ->placeholder('-')
                            ->columnSpanFull(),

                        TextEntry::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Tidak ada deskripsi.')
                            ->columnSpanFull(),

                        ImageEntry::make('thumbnail')
                            ->label('Thumbnail Sertifikat')
                            ->disk('public')
                            ->height(280)
                            ->columnSpanFull(),

                        TextEntry::make('pdf_file')
                            ->label('File PDF')
                            ->formatStateUsing(fn(?string $state) => $state ? basename($state) : '-')
                            ->placeholder('-'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}