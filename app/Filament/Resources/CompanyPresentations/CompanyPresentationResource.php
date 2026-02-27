<?php

namespace App\Filament\Resources\CompanyPresentations;

use App\Filament\Resources\CompanyPresentations\Pages\EditCompanyPresentation;
use App\Filament\Resources\CompanyPresentations\Pages\ListCompanyPresentations;
use App\Filament\Resources\CompanyPresentations\Schemas\CompanyPresentationForm;
use App\Filament\Resources\CompanyPresentations\Tables\CompanyPresentationTable;
use App\Models\CompanyPresentation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CompanyPresentationResource extends Resource
{
    protected static ?string $model = CompanyPresentation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPencilSquare;

    protected static ?string $navigationLabel = 'Presentación de Empresa';

    protected static ?string $modelLabel = 'Presentación de Empresa';

    protected static ?string $pluralModelLabel = 'Presentación de Empresa';

    public static function form(Schema $schema): Schema
    {
        return CompanyPresentationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CompanyPresentationTable::configure($table);
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
            'index' => ListCompanyPresentations::route('/'),
            'edit' => EditCompanyPresentation::route('/{record}/edit'),
        ];
    }
}
