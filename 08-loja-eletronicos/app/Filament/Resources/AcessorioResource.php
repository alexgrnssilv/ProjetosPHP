<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcessorioResource\Pages;
use App\Models\Acessorio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AcessorioResource extends Resource
{
    protected static ?string $model = Acessorio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Acessorio';
    protected static ?string $pluralModelLabel = 'Acessorios';
    protected static ?string $navigationLabel = 'Acessorios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome do Acessorio (Cabo, Capa, Fone)')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo de Barras / SKU')
                    ->required(),
                Forms\Components\Select::make('fabricante_id')
                    ->label('Fabricante')
                    ->relationship('fabricante', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('compatibilidade')
                    ->label('Compatibilidade (Modelo Celular/PC)')
                    ->required(),
                Forms\Components\TextInput::make('cor')
                    ->label('Cor')
                    ->required(),
                Forms\Components\TextInput::make('material')
                    ->label('Material de FabricaAAo')
                    ->required(),
                Forms\Components\Toggle::make('garantia_estendida')
                    ->label('Possui Garantia Estendida (Sim/NAo)'),
                Forms\Components\TextInput::make('preco')
                    ->label('Preco (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade em Estoque')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome do Acessorio (Cabo, Capa, Fone)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo de Barras / SKU')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fabricante.nome')
                    ->label('Fabricante')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('compatibilidade')
                    ->label('Compatibilidade (Modelo Celular/PC)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cor')
                    ->label('Cor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('material')
                    ->label('Material de FabricaAAo')
                    
                    ->sortable(),
                Tables\Columns\IconColumn::make('garantia_estendida')
                    ->label('Possui Garantia Estendida (Sim/NAo)')
                    ->boolean(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preco (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade em Estoque')
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
            'index' => Pages\ListAcessorios::route('/'),
            'create' => Pages\CreateAcessorio::route('/create'),
            'edit' => Pages\EditAcessorio::route('/{record}/edit'),
        ];
    }
}