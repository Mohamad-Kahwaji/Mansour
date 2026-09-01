<?php

namespace App\Filament\Admin\Resources\Projects\Pages;

use App\Filament\Admin\Resources\Projects\ProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['title'] = $this->record->getTranslations('title');
        $data['scope'] = $this->record->getTranslations('scope');

        return $data;
    }
}
