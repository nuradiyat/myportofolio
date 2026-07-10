<?php

namespace App\Filament\Resources\ProjectGalleries\Pages;

use App\Filament\Resources\ProjectGalleries\ProjectGalleryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProjectGalleries extends ListRecords
{
    protected static string $resource = ProjectGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
