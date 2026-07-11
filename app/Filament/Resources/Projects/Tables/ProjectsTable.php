<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square(),

                TextColumn::make('title')
                    ->label('Judul Project')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->weight('semiBold'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn(?string $state): string => match ($state) {
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'maintenance' => 'Maintenance',
                        'archived' => 'Archived',
                        default => ucfirst((string) $state),
                    })
                    ->color(fn(?string $state): string => match ($state) {
                        'ongoing' => 'warning',
                        'completed' => 'success',
                        'maintenance' => 'info',
                        'archived' => 'gray',
                        default => 'gray',
                    }),

                TextColumn::make('skills.name')
                    ->label('Teknologi')
                    ->badge()
                    ->separator(','),

                TextColumn::make('start_date')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('-'),

                TextColumn::make('end_date')
                    ->label('Selesai')
                    ->date('d M Y')
                    ->sortable()
                    ->placeholder('Masih berjalan'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordTitleAttribute('title')
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
