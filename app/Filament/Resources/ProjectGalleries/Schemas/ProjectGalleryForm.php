<?php

namespace App\Filament\Resources\ProjectGalleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectGalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Gallery')
                    ->description('Tambahkan gambar gallery yang terhubung ke project tertentu.')
                    ->schema([
                        Select::make('project_id')
                            ->label('Project')
                            ->relationship('project', 'title')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->native(false)
                            ->placeholder('Pilih project terlebih dahulu')
                            ->helperText('Gallery ini akan ditampilkan pada detail project yang dipilih.'),

                        Placeholder::make('project_note')
                            ->label('Catatan Project')
                            ->content('Pastikan gambar yang diunggah sesuai dengan project yang dipilih agar tampilan detail project tetap rapi dan relevan.'),

                        FileUpload::make('image')
                            ->label('Gambar Gallery')
                            ->image()
                            ->disk('public')
                            ->directory('projects/galleries')
                            ->visibility('public')
                            ->imageEditor()
                            ->imagePreviewHeight('220')
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Upload gambar gallery project. Format JPG, JPEG, PNG, atau WEBP.'),

                        Textarea::make('caption')
                            ->label('Caption')
                            ->rows(4)
                            ->nullable()
                            ->columnSpanFull()
                            ->placeholder('Contoh: Tampilan halaman dashboard admin, halaman detail project, atau fitur utama yang sedang ditampilkan.')
                            ->helperText('Opsional. Isi keterangan singkat untuk menjelaskan isi gambar gallery.'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}
