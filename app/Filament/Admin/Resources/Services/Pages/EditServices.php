<?php

namespace App\Filament\Admin\Resources\Services\Pages;

use App\Filament\Admin\Resources\Services\ServicesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServices extends EditRecord
{
    protected static string $resource = ServicesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['title'] = $this->record->getTranslations('title');
        $data['description'] = $this->record->getTranslations('description');

        return $data;
    }
}
