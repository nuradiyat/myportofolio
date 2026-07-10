<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Skill')
                    ->description('Kelola data skill, kategori, dan icon yang akan ditampilkan pada website portofolio.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Skill')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Laravel, PHP, MySQL')
                            ->columnSpanFull(),

                        TextInput::make('category')
                            ->label('Kategori')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Backend, Frontend, Database, Tools')
                            ->columnSpanFull(),

                        TextInput::make('icon')
                            ->label('Icon')
                            ->maxLength(255)
                            ->nullable()
                            ->placeholder('Contoh: laravel, github, mysql, php, tailwindcss')
                            ->helperText('Isi nama icon dengan nama sesuai nama platform icon yang kamu pakai. Contoh: laravel, github, mysql, php, tailwindcss.')
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }
}