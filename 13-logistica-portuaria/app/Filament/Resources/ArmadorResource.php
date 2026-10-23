<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArmadorResource\Pages;
use App\Models\Armador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ArmadorResource extends Resource
{
    protected static ?string $model = Armador::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Armador';
    protected static ?string $pluralModelLabel = 'Armadores';
    protected static ?string $navigationLabel = 'Armadores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Armador / Cia de NavegaAAo')
                    ->required(),
                Forms\Components\TextInput::make('pais')
                    ->label('PaAs de Registro')
                    ->required(),
                Forms\Components\TextInput::make('contato')
                    ->label('Contato Operacional')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Armador / Cia de NavegaAAo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pais')
                    ->label('PaAs de Registro')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contato')
                    ->label('Contato Operacional')
                    
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
            'index' => Pages\ListArmadores::route('/'),
            'create' => Pages\CreateArmador::route('/create'),
            'edit' => Pages\EditArmador::route('/{record}/edit'),
        ];
    }
}