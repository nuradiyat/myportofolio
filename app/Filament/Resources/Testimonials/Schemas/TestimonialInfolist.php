<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Ringkasan Testimonial')
                    ->description('Informasi pemberi testimonial.')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama')
                            ->weight('bold')
                            ->icon('heroicon-o-user'),

                        TextEntry::make('position')
                            ->label('Posisi / Jabatan')
                            ->placeholder('Tidak dicantumkan')
                            ->icon('heroicon-o-briefcase'),

                        TextEntry::make('organization')
                            ->label('Perusahaan / Institusi')
                            ->placeholder('Tidak dicantumkan')
                            ->icon('heroicon-o-building-office-2'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Isi Testimonial')
                    ->description('Pesan atau kesan yang diberikan.')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        TextEntry::make('message')
                            ->label('Testimonial')
                            ->prose()
                            ->columnSpanFull()
                            ->formatStateUsing(fn(?string $state): string => $state
                                ? '“' . $state . '”'
                                : '-'),
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}