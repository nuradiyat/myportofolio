<?php

namespace App\Filament\Resources\ProjectGalleries;

use App\Filament\Resources\ProjectGalleries\Pages\CreateProjectGallery;
use App\Filament\Resources\ProjectGalleries\Pages\EditProjectGallery;
use App\Filament\Resources\ProjectGalleries\Pages\ListProjectGalleries;
use App\Filament\Resources\ProjectGalleries\Pages\ViewProjectGallery;
use App\Filament\Resources\ProjectGalleries\Schemas\ProjectGalleryForm;
use App\Filament\Resources\ProjectGalleries\Schemas\ProjectGalleryInfolist;
use App\Filament\Resources\ProjectGalleries\Tables\ProjectGalleriesTable;
use App\Models\ProjectGallery;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ProjectGalleryResource extends Resource
{
    protected static ?string $model = ProjectGallery::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Project Galleries';

    protected static ?string $modelLabel = 'Project Gallery';

    protected static ?string $pluralModelLabel = 'Project Galleries';

    protected static string|UnitEnum|null $navigationGroup = 'Showcase';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ProjectGalleryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectGalleryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectGalleriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjectGalleries::route('/'),
            'create' => CreateProjectGallery::route('/create'),
            'view' => ViewProjectGallery::route('/{record}'),
            'edit' => EditProjectGallery::route('/{record}/edit'),
        ];
    }
}