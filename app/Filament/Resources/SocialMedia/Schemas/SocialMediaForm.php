<?php

namespace App\Filament\Resources\SocialMedia\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class SocialMediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Social Media')
                    ->description('Kelola tautan media sosial yang ditampilkan pada website portofolio.')
                    ->schema([
                        TextInput::make('platform')
                            ->label('Platform')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('url')
                            ->label('URL')
                            ->required()
                            ->rule(function () {
                                return function ($attribute, $value, $fail) {
                                    if (
                                        filter_var($value, FILTER_VALIDATE_URL)
                                        || str_starts_with($value, 'mailto:')
                                    ) {
                                        return;
                                    }

                                    $fail('Masukkan URL yang valid atau mailto:email@example.com');
                                };
                            })
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('icon')
                            ->label('Icon')
                            ->maxLength(255)
                            ->helperText('Contoh: heroicon-o-globe-alt / nama icon lain yang kamu pakai.')
                            ->columnSpanFull(),

                        TextInput::make('display_order')
                            ->label('Urutan Tampil')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }
}
