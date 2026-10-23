<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PecaResource\Pages;
use App\Models\Peca;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PecaResource extends Resource
{
    protected static ?string $model = Peca::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Peca';
    protected static ?string $pluralModelLabel = 'Pecas';
    protected static ?string $navigationLabel = 'Pecas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome da Peca')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo da Peca')
                    ->required(),
                Forms\Components\TextInput::make('numero_serie')
                    ->label('Numero de Serie')
                    ->required(),
                Forms\Components\Select::make('fornecedor_id')
                    ->label('Fornecedor')
                    ->relationship('fornecedor', 'nome')
                    ->required(),
                Forms\Components\Select::make('robo_id')
                    ->label('Robo Compativel')
                    ->relationship('robo', 'modelo')
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Preco (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade em Estoque')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('vida_util_horas')
                    ->label('Vida Atil (horas)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('localizacao_almoxarifado')
                    ->label('Localizacao no Almoxarifado (Corredor/Prat.)')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome da Peca')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo da Peca')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numero_serie')
                    ->label('Numero de Serie')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fornecedor.nome')
                    ->label('Fornecedor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('robo.modelo')
                    ->label('Robo Compativel')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preco (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade em Estoque')
                    ->sortable(),
                Tables\Columns\TextColumn::make('vida_util_horas')
                    ->label('Vida Atil (horas)')
                    ->sortable(),
                Tables\Columns\TextColumn::make('localizacao_almoxarifado')
                    ->label('Localizacao no Almoxarifado (Corredor/Prat.)')
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
            'index' => Pages\ListPecas::route('/'),
            'create' => Pages\CreatePeca::route('/create'),
            'edit' => Pages\EditPeca::route('/{record}/edit'),
        ];
    }
}