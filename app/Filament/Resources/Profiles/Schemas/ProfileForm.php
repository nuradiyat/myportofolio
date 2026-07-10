<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Profil')
                    ->description('Kelola data profil utama yang ditampilkan pada website portofolio.')
                    ->schema([
                        TextInput::make('full_name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('profession')
                            ->label('Profesi / Jabatan')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('short_bio')
                            ->label('Bio Singkat')
                            ->required()
                            ->rows(4)
                            ->autosize()
                            ->maxLength(500)
                            ->placeholder('Tulis ringkasan singkat tentang diri Anda, keahlian utama, atau fokus bidang yang ditekuni.')
                            ->helperText('Bio singkat ini akan tampil pada bagian hero / ringkasan profil.')
                            ->columnSpanFull(),

                        Textarea::make('about')
                            ->label('Tentang Saya')
                            ->required()
                            ->rows(8)
                            ->autosize()
                            ->maxLength(65535)
                            ->placeholder("Tulis deskripsi lengkap tentang diri Anda.\n\nContoh:\nSaya adalah mahasiswa IT yang berfokus pada pengembangan website menggunakan Laravel, Filament, dan Tailwind CSS.\n\nSaya juga tertarik pada backend development, UI website, dan pengelolaan database.")
                            ->helperText('Gunakan Enter untuk membuat paragraf baru. Tidak perlu menulis tag HTML seperti <p> atau <br>.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                ComponentsSection::make('Media Profil')
                    ->description('Unggah foto profil dan file CV yang akan ditampilkan pada website.')
                    ->schema([
                        FileUpload::make('profile_photo')
                            ->label('Foto Profil')
                            ->image()
                            ->disk('public')
                            ->directory('profiles/photos')
                            ->visibility('public')
                            ->imagePreviewHeight('180')
                            ->maxSize(2048) // 2 MB
                            ->nullable()
                            ->helperText('Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.'),

                        FileUpload::make('logo_website')
                            ->label('Logo Website')
                            ->image()
                            ->disk('public')
                            ->directory('profiles/logos')
                            ->visibility('public')
                            ->imagePreviewHeight('180')
                            ->maxSize(2048) // 2 MB
                            ->nullable()
                            ->helperText('Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.'),


                        FileUpload::make('cv_file')
                            ->label('File CV')
                            ->disk('public')
                            ->directory('profiles/cv')
                            ->visibility('public')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(5120)
                            ->nullable()
                            ->helperText('Format PDF. Maksimal 5 MB.'),
                    ])
                    ->columns(2),
            ]);
    }
}