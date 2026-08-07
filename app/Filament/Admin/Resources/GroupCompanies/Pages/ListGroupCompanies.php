<?php

namespace App\Filament\Admin\Resources\GroupCompanies\Pages;

use App\Filament\Admin\Resources\GroupCompanies\GroupCompanyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGroupCompanies extends ListRecords
{
    protected static string $resource = GroupCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
