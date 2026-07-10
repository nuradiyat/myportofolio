<?php

namespace App\Filament\Resources\ProjectGalleries\Pages;

use App\Filament\Resources\ProjectGalleries\ProjectGalleryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProjectGallery extends EditRecord
{
    protected static string $resource = ProjectGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
