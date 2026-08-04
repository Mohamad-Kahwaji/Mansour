<?php

namespace App\Filament\Admin\Resources\Certificates\Pages;

use App\Filament\Admin\Resources\Certificates\CertificatesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCertificates extends EditRecord
{
    protected static string $resource = CertificatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['title'] = $this->record->getTranslations('title');

        return $data;
    }
}
