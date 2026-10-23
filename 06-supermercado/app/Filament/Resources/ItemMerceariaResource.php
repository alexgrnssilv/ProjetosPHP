<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemMerceariaResource\Pages;
use App\Models\ItemMercearia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ItemMerceariaResource extends Resource
{
    protected static ?string $model = ItemMercearia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Item de Mercearia';
    protected static ?string $pluralModelLabel = 'Itens de Mercearia';
    protected static ?string $navigationLabel = 'Itens de Mercearia';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Descricao do Produto')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo Interno')
                    ->required(),
                Forms\Components\Select::make('fornecedor_id')
                    ->label('Fornecedor')
                    ->relationship('fornecedor', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('marca')
                    ->label('Marca')
                    ->required(),
                Forms\Components\Select::make('unidade_medida')
                    ->label('Unidade de Medida')
                    ->options(array (
  'Kg' => 'Kg',
  'Litro' => 'Litro',
  'Unidade' => 'Unidade',
))
                    ->required(),
                Forms\Components\TextInput::make('codigo_barras_ean')
                    ->label('Codigo de Barras (EAN)')
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Preco (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade Atual')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('estoque_minimo')
                    ->label('Estoque MAnimo para Reposicao')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Descricao do Produto')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo Interno')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fornecedor.nome')
                    ->label('Fornecedor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marca')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unidade_medida')
                    ->label('Unidade de Medida')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo_barras_ean')
                    ->label('Codigo de Barras (EAN)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preco (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade Atual')
                    ->sortable(),
                Tables\Columns\TextColumn::make('estoque_minimo')
                    ->label('Estoque MAnimo para Reposicao')
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
            'index' => Pages\ListItemMercearias::route('/'),
            'create' => Pages\CreateItemMercearia::route('/create'),
            'edit' => Pages\EditItemMercearia::route('/{record}/edit'),
        ];
    }
}