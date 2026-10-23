<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReagenteQuimicoResource\Pages;
use App\Models\ReagenteQuimico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReagenteQuimicoResource extends Resource
{
    protected static ?string $model = ReagenteQuimico::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Reagente Quimico';
    protected static ?string $pluralModelLabel = 'Reagentes Quimicos';
    protected static ?string $navigationLabel = 'Reagentes Quimicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome do Reagente')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo do Frasco/ID')
                    ->required(),
                Forms\Components\Select::make('fabricante_id')
                    ->label('Fabricante')
                    ->relationship('fabricante', 'nome')
                    ->required(),
                Forms\Components\Select::make('nivel_periculosidade')
                    ->label('Nivel de Periculosidade')
                    ->options(array (
  'Corrosivo' => 'Corrosivo',
  'InflamAvel' => 'InflamAvel',
  'TAxico' => 'TAxico',
  'Neutro' => 'Neutro',
))
                    ->required(),
                Forms\Components\TextInput::make('temperatura_conservacao')
                    ->label('Temperatura de ConservaAAo (ACC)')
                    ->required(),
                Forms\Components\TextInput::make('volume_restante_ml')
                    ->label('Volume Restante no Frasco (ml)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Preco (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade de Frascos')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome do Reagente')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo do Frasco/ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fabricante.nome')
                    ->label('Fabricante')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nivel_periculosidade')
                    ->label('Nivel de Periculosidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('temperatura_conservacao')
                    ->label('Temperatura de ConservaAAo (ACC)')
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('volume_restante_ml')
                    ->label('Volume Restante no Frasco (ml)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preco (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade de Frascos')
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
            'index' => Pages\ListReagenteQuimicos::route('/'),
            'create' => Pages\CreateReagenteQuimico::route('/create'),
            'edit' => Pages\EditReagenteQuimico::route('/{record}/edit'),
        ];
    }
}