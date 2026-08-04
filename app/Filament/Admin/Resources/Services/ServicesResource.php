<?php

namespace App\Filament\Admin\Resources\Services;

use App\Filament\Admin\Resources\Services\Pages\CreateServices;
use App\Filament\Admin\Resources\Services\Pages\EditServices;
use App\Filament\Admin\Resources\Services\Pages\ListServices;
use App\Filament\Admin\Resources\Services\Schemas\ServicesForm;
use App\Filament\Admin\Resources\Services\Tables\ServicesTable;
use App\Models\Services;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServicesResource extends Resource
{
    protected static ?string $model = Services::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ServicesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServicesTable::configure($table);
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
            'index' => ListServices::route('/'),
            'create' => CreateServices::route('/create'),
            'edit' => EditServices::route('/{record}/edit'),
        ];
    }
}
