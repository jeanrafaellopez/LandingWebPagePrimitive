<?php

namespace App\Filament\Resources\CompanyPresentations\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class CompanyPresentationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('contenido')
                    ->label('Texto de Presentación')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
