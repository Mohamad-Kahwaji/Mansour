<?php

namespace App\Filament\Admin\Resources\GroupCompanies\Pages;

use App\Filament\Admin\Resources\GroupCompanies\GroupCompanyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGroupCompany extends CreateRecord
{
    protected static string $resource = GroupCompanyResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
