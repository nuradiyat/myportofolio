<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengirim')
                    ->description('Data pengirim pesan dari halaman kontak.')
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Muhammad Nuradiyat'),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('contoh@email.com'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Isi Pesan')
                    ->description('Subjek dan isi pesan yang dikirim.')
                    ->icon('heroicon-o-envelope-open')
                    ->schema([
                        TextInput::make('subject')
                            ->label('Subjek')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->placeholder('Contoh: Kerja Sama Project Website'),

                        Textarea::make('message')
                            ->label('Pesan')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull()
                            ->helperText('Isi pesan dari pengirim.')
                            ->placeholder('Tulis isi pesan di sini...'),
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}