<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoResource\Pages;
use App\Models\Produto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Produto';
    protected static ?string $pluralModelLabel = 'Produtos';
    protected static ?string $navigationLabel = 'Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome do Produto')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo do Produto')
                    ->required(),
                Forms\Components\Select::make('fornecedor_id')
                    ->label('Fornecedor')
                    ->relationship('fornecedor', 'nome')
                    ->required(),
                Forms\Components\Select::make('categoria')
                    ->label('Categoria')
                    ->options(array (
  'Bebida' => 'Bebida',
  'Salgado' => 'Salgado',
  'Doce' => 'Doce',
))
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Preco (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade nas Prateleiras')
                    ->numeric()
                    ->required(),
                Forms\Components\DatePicker::make('data_validade')
                    ->label('Data de Validade (Critico)')
                    ->required(),
                Forms\Components\TextInput::make('temperatura_armazenamento')
                    ->label('Temperatura de Armazenamento')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome do Produto')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo do Produto')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fornecedor.nome')
                    ->label('Fornecedor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('categoria')
                    ->label('Categoria')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preco (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade nas Prateleiras')
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_validade')
                    ->label('Data de Validade (Critico)')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('temperatura_armazenamento')
                    ->label('Temperatura de Armazenamento')
                    
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
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProduto::route('/create'),
            'edit' => Pages\EditProduto::route('/{record}/edit'),
        ];
    }
}