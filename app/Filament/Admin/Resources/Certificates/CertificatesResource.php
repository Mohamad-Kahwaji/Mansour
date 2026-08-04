<?php

namespace App\Filament\Admin\Resources\Certificates;

use App\Filament\Admin\Resources\Certificates\Pages\CreateCertificates;
use App\Filament\Admin\Resources\Certificates\Pages\EditCertificates;
use App\Filament\Admin\Resources\Certificates\Pages\ListCertificates;
use App\Filament\Admin\Resources\Certificates\Schemas\CertificatesForm;
use App\Filament\Admin\Resources\Certificates\Tables\CertificatesTable;
use App\Models\Certificates;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CertificatesResource extends Resource
{
    protected static ?string $model = Certificates::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CertificatesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CertificatesTable::configure($table);
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
            'index' => ListCertificates::route('/'),
            'create' => CreateCertificates::route('/create'),
            'edit' => EditCertificates::route('/{record}/edit'),
        ];
    }
}
