<?php

namespace App\Filament\Admin\Resources\Certificates\Pages;

use App\Filament\Admin\Resources\Certificates\CertificatesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCertificates extends CreateRecord
{
    protected static string $resource = CertificatesResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
