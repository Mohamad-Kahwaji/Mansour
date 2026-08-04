<?php

namespace App\Filament\Admin\Resources\Certificates\Pages;

use App\Filament\Admin\Resources\Certificates\CertificatesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCertificates extends ListRecords
{
    protected static string $resource = CertificatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
