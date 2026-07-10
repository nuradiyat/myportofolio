<?php

namespace App\Filament\Resources\ProjectGalleries\Pages;

use App\Filament\Resources\ProjectGalleries\ProjectGalleryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectGallery extends ViewRecord
{
    protected static string $resource = ProjectGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
