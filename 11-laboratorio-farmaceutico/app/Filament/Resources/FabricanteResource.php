<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FabricanteResource\Pages;
use App\Models\Fabricante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FabricanteResource extends Resource
{
    protected static ?string $model = Fabricante::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Fabricante';
    protected static ?string $pluralModelLabel = 'Fabricantes';
    protected static ?string $navigationLabel = 'Fabricantes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Fabricante / Laboratorio Quimico')
                    ->required(),
                Forms\Components\TextInput::make('cnpj')
                    ->label('CNPJ')
                    ->required(),
                Forms\Components\TextInput::make('licenca_quimica')
                    ->label('Numero de LicenAa TAcnica')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Fabricante / Laboratorio Quimico')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cnpj')
                    ->label('CNPJ')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('licenca_quimica')
                    ->label('Numero de LicenAa TAcnica')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListFabricantes::route('/'),
            'create' => Pages\CreateFabricante::route('/create'),
            'edit' => Pages\EditFabricante::route('/{record}/edit'),
        ];
    }
}