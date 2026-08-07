<?php

namespace App\Filament\Admin\Resources\GroupCompanies;

use App\Filament\Admin\Resources\GroupCompanies\Pages\CreateGroupCompany;
use App\Filament\Admin\Resources\GroupCompanies\Pages\EditGroupCompany;
use App\Filament\Admin\Resources\GroupCompanies\Pages\ListGroupCompanies;
use App\Filament\Admin\Resources\GroupCompanies\Schemas\GroupCompanyForm;
use App\Filament\Admin\Resources\GroupCompanies\Tables\GroupCompaniesTable;
use App\Models\GroupCompany;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GroupCompanyResource extends Resource
{
    protected static ?string $model = GroupCompany::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return GroupCompanyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GroupCompaniesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGroupCompanies::route('/'),
            'create' => CreateGroupCompany::route('/create'),
            'edit' => EditGroupCompany::route('/{record}/edit'),
        ];
    }
}
