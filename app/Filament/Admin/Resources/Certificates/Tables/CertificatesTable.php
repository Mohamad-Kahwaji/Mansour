<?php

namespace App\Filament\Admin\Resources\Certificates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CertificatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover')
                    ->label('صورة')
                    ->collection('cover')
                    ->circular(),
                TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable(),
                TextColumn::make('issuer')
                    ->label('الجهة المانحة')
                    ->searchable(),
                TextColumn::make('issued_at')
                    ->label('تاريخ الإصدار')
                    ->date()
                    ->sortable(),
                TextColumn::make('expires_at')
                    ->label('تاريخ الانتهاء')
                    ->date()
                    ->sortable(),
                TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
