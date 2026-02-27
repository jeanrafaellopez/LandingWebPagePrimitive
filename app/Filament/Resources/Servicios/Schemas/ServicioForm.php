<?php

namespace App\Filament\Resources\Servicios\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class ServicioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->label('Título')
                    ->required()
                    ->maxLength(255),
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->maxLength(65535),
                FileUpload::make('imagen')
                    ->label('Imagen')
                    ->image()
                    ->directory('servicios')
                    ->disk('public')
                    ->visibility('public'),
            ]);
    }
}
