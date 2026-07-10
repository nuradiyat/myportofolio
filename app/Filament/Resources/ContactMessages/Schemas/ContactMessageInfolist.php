<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengirim')
                    ->description('Data pengirim pesan dari form kontak.')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama')
                            ->icon('heroicon-o-user')
                            ->weight('bold'),

                        TextEntry::make('email')
                            ->label('Email')
                            ->icon('heroicon-o-envelope')
                            ->copyable(),

                        TextEntry::make('created_at')
                            ->label('Dikirim Pada')
                            ->dateTime('d M Y, H:i')
                            ->icon('heroicon-o-calendar-days'),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                Section::make('Pesan Masuk')
                    ->description('Detail subjek dan isi pesan.')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        TextEntry::make('subject')
                            ->label('Subjek')
                            ->weight('bold')
                            ->columnSpanFull(),

                        TextEntry::make('message')
                            ->label('Isi Pesan')
                            ->prose()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}