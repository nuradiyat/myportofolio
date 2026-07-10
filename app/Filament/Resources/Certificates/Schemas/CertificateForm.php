<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class CertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Sertifikat')
                    ->description('Kelola data sertifikat, pelatihan, atau kompetensi yang akan ditampilkan pada website portofolio.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Sertifikat')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Belajar Dasar AI'),

                        TextInput::make('issuer')
                            ->label('Penerbit / Penyelenggara')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Dicoding, BNSP, Coursera'),

                        TextInput::make('certificate_number')
                            ->label('Nomor Sertifikat')
                            ->maxLength(255)
                            ->nullable()
                            ->placeholder('Opsional, isi jika sertifikat memiliki nomor resmi.'),

                        TextInput::make('issue_year')
                            ->label('Tahun Terbit')
                            ->numeric()
                            ->required()
                            ->minValue(2000)
                            ->maxValue((int) date('Y') + 10)
                            ->placeholder('Contoh: 2026')
                            ->helperText('Masukkan tahun terbit sertifikat.'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->nullable()
                            ->columnSpanFull()
                            ->placeholder('Jelaskan singkat isi sertifikat, kompetensi yang dipelajari, atau pencapaian yang diperoleh.')
                            ->helperText('Opsional. Deskripsi ini bisa ditampilkan pada detail sertifikat di website.'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                ComponentsSection::make('Media & Dokumen')
                    ->description('Unggah thumbnail sertifikat dan file dokumen pendukung jika tersedia.')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail Sertifikat')
                            ->image()
                            ->disk('public')
                            ->directory('certificates/thumbnails')
                            ->visibility('public')
                            ->imageEditor()
                            ->imagePreviewHeight('220')
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->helperText('Upload gambar thumbnail sertifikat. Format JPG, JPEG, PNG, atau WEBP.'),

                        Placeholder::make('thumbnail_note')
                            ->label('Catatan Thumbnail')
                            ->content('Gunakan thumbnail yang jelas dan proporsional agar tampilan daftar sertifikat di website lebih rapi.'),

                        FileUpload::make('pdf_file')
                            ->label('File Sertifikat (PDF)')
                            ->disk('public')
                            ->directory('certificates/files')
                            ->visibility('public')
                            ->acceptedFileTypes(['application/pdf'])
                            ->downloadable()
                            ->openable()
                            ->nullable()
                            ->columnSpanFull()
                            ->helperText('Opsional. Upload file PDF sertifikat jika ingin menyediakan dokumen untuk dilihat atau diunduh.'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                ComponentsSection::make('Link & Masa Berlaku')
                    ->description('Lengkapi tautan kredensial dan masa berlaku sertifikat jika ada.')
                    ->schema([
                        TextInput::make('credential_url')
                            ->label('Credential URL')
                            ->url()
                            ->nullable()
                            ->prefixIcon('heroicon-o-link')
                            ->placeholder('https://example.com/certificate'),

                        DatePicker::make('expired_at')
                            ->label('Tanggal Kedaluwarsa')
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->nullable()
                            ->helperText('Kosongkan jika sertifikat tidak memiliki masa berlaku.'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}
