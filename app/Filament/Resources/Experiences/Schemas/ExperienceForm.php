<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Pengalaman')
                    ->description('Kelola data pengalaman organisasi, magang, kerja, atau freelance yang akan ditampilkan pada website portofolio.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Logo / Gambar Pengalaman')
                            ->image()
                            ->disk('public')
                            ->directory('experiences')
                            ->visibility('public')
                            ->imagePreviewHeight('180')
                            ->maxSize(2048)
                            ->helperText('Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.')
                            ->columnSpanFull(),

                        TextInput::make('organization')
                            ->label('Organisasi / Perusahaan / Instansi')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: PT Maju Jaya / Himpunan Mahasiswa'),

                        TextInput::make('position')
                            ->label('Posisi / Jabatan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Web Developer Intern'),

                        TextInput::make('type')
                            ->label('Tipe Pengalaman')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Internship, Freelance, Organization'),

                        DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->required()
                            ->native(false)
                            ->displayFormat('d M Y'),

                        DatePicker::make('end_date')
                            ->label('Tanggal Selesai')
                            ->nullable()
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->helperText('Kosongkan jika pengalaman masih berjalan.'),

                        Textarea::make('description')
                            ->label('Deskripsi Pengalaman')
                            ->required()
                            ->rows(8)
                            ->autosize()
                            ->columnSpanFull()
                            ->placeholder("Tulis ringkasan pengalaman, tanggung jawab, kontribusi, atau pencapaian.\n\nContoh:\n- Mengembangkan fitur dashboard admin\n- Membuat halaman website responsif\n- Berkolaborasi dalam pengelolaan program kerja"),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
