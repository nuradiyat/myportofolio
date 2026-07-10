<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Testimonial')
                    ->description('Kelola data testimonial yang akan ditampilkan pada website portofolio.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Muhammad Nuradiyat'),

                        TextInput::make('position')
                            ->label('Posisi / Jabatan')
                            ->nullable()
                            ->maxLength(255)
                            ->placeholder('Contoh: Web Developer'),

                        TextInput::make('organization')
                            ->label('Perusahaan / Institusi')
                            ->nullable()
                            ->maxLength(255)
                            ->placeholder('Contoh: PT Contoh Indonesia'),

                        Textarea::make('message')
                            ->label('Isi Testimonial')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull()
                            ->helperText('Isi testimonial, kesan, atau penilaian yang diberikan.')
                            ->placeholder('Tulis isi testimonial di sini...'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}
