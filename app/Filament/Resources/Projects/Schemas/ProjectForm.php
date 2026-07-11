<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Project')
                    ->description('Kelola data utama project yang akan ditampilkan pada website portofolio.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Project')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (?string $state, callable $set, callable $get): void {
                                if (filled($state) && blank($get('slug'))) {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Slug digunakan untuk URL project. Gunakan format huruf kecil dan tanda hubung.'),

                        Select::make('status')
                            ->label('Status Project')
                            ->required()
                            ->options([
                                'ongoing' => 'Ongoing',
                                'completed' => 'Completed',
                                'maintenance' => 'Maintenance',
                                'archived' => 'Archived',
                            ])
                            ->native(false)
                            ->searchable(),

                        Select::make('skills')
                            ->label('Skill / Teknologi')
                            ->relationship('skills', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->columnSpanFull()
                            ->helperText('Pilih skill atau teknologi yang digunakan pada project ini.'),

                        Textarea::make('short_description')
                            ->label('Deskripsi Singkat')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull()
                            ->helperText('Ringkasan singkat project untuk kartu project atau preview di halaman utama.'),

                        RichEditor::make('description')
                            ->label('Deskripsi Lengkap')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'blockquote',
                                'redo',
                                'undo',
                            ])
                            ->helperText('Jelaskan project secara lebih lengkap, misalnya latar belakang, proses, dan hasil project.'),

                        Textarea::make('objective')
                            ->label('Tujuan Project')
                            ->rows(4)
                            ->nullable()
                            ->columnSpanFull()
                            ->helperText('Opsional. Jelaskan tujuan utama project ini dibuat.'),

                       Repeater::make('features')
                            ->label('Fitur Project')
                            ->schema([
                                TextInput::make('value')
                                    ->label('Nama Fitur')
                                    ->required()
                                    ->maxLength(255),
                            ])

                            // Saat membuka halaman Edit
                            ->formatStateUsing(function ($state) {

                                if (! is_array($state)) {
                                    return [];
                                }

                                return collect($state)
                                    ->map(fn ($item) => ['value' => $item])
                                    ->toArray();
                            })

                            // Saat klik Save
                            ->dehydrateStateUsing(function ($state) {

                                return collect($state)
                                    ->pluck('value')
                                    ->filter()
                                    ->values()
                                    ->toArray();
                            })

                            ->defaultItems(0)
                            ->addActionLabel('Tambah Fitur')
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull()
                            ->helperText('Tambahkan daftar fitur utama project.'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                ComponentsSection::make('Media & Link Project')
                    ->description('Unggah thumbnail project dan lengkapi tautan pendukung seperti GitHub atau demo.')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail Project')
                            ->image()
                            ->disk('public')
                            ->directory('projects/thumbnails')
                            ->visibility('public')
                            ->imageEditor()
                            ->imagePreviewHeight('220')
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->helperText('Format JPG, JPEG, PNG, atau WEBP.'),

                        Placeholder::make('thumbnail_note')
                            ->label('Catatan Thumbnail')
                            ->content('Gunakan gambar preview project dengan rasio yang konsisten agar tampilan kartu project lebih rapi.'),

                        TextInput::make('github_url')
                            ->label('GitHub URL')
                            ->url()
                            ->nullable()
                            ->prefixIcon('heroicon-o-code-bracket')
                            ->placeholder('https://github.com/username/nama-project'),

                        TextInput::make('demo_url')
                            ->label('Demo / Live URL')
                            ->url()
                            ->nullable()
                            ->prefixIcon('heroicon-o-globe-alt')
                            ->placeholder('https://example.com'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                ComponentsSection::make('Periode Project')
                    ->description('Atur tanggal pengerjaan project.')
                    ->schema([
                        DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->nullable(),

                        DatePicker::make('end_date')
                            ->label('Tanggal Selesai')
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->nullable()
                            ->helperText('Kosongkan jika project masih berjalan.'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}