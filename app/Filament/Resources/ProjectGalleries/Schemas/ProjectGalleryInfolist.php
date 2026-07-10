<?php

namespace App\Filament\Resources\ProjectGalleries\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectGalleryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Gallery Project')
                    ->description('Informasi gambar gallery yang terhubung dengan project.')
                    ->schema([
                        TextEntry::make('project.title')
                            ->label('Project')
                            ->badge()
                            ->color('primary'),

                        TextEntry::make('created_at')
                            ->label('Dibuat Pada')
                            ->dateTime('d M Y, H:i')
                            ->placeholder('-'),

                        TextEntry::make('caption')
                            ->label('Caption')
                            ->placeholder('Tidak ada caption.')
                            ->columnSpanFull(),

                        ImageEntry::make('image')
                            ->label('Preview Gambar')
                            ->disk('public')
                            ->height(320)
                            ->extraImgAttributes([
                                'class' => 'rounded-xl object-cover',
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}