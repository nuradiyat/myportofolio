<?php

namespace App\Filament\Resources\SocialMedia\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SocialMediaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Social Media')
                    ->description('Informasi detail tautan media sosial.')
                    ->schema([
                        TextEntry::make('platform')
                            ->label('Platform')
                            ->badge()
                            ->color('primary'),

                        TextEntry::make('url')
                            ->label('URL')
                            ->url(fn($record) => $record->url, shouldOpenInNewTab: true)
                            ->copyable(),

                        TextEntry::make('icon')
                            ->label('Icon')
                            ->placeholder('Tidak diisi'),

                        TextEntry::make('display_order')
                            ->label('Urutan Tampil'),

                        TextEntry::make('created_at')
                            ->label('Dibuat')
                            ->dateTime('d M Y H:i'),

                        TextEntry::make('updated_at')
                            ->label('Diupdate')
                            ->dateTime('d M Y H:i'),
                    ])
                    ->columns(2),
            ]);
    }
}