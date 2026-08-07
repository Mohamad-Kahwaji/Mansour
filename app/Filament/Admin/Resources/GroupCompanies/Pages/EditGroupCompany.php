<?php

namespace App\Filament\Admin\Resources\GroupCompanies\Pages;

use App\Filament\Admin\Resources\GroupCompanies\GroupCompanyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGroupCompany extends EditRecord
{
    protected static string $resource = GroupCompanyResource::class;

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
