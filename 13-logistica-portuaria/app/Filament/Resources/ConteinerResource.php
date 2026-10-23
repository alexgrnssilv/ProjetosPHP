<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConteinerResource\Pages;
use App\Models\Conteiner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConteinerResource extends Resource
{
    protected static ?string $model = Conteiner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Conteiner';
    protected static ?string $pluralModelLabel = 'Conteineres';
    protected static ?string $navigationLabel = 'Conteineres';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Identificacao do Lote/Carga')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo de Registro')
                    ->required(),
                Forms\Components\TextInput::make('numero_conteiner')
                    ->label('Numero do Conteiner (ISO 6346)')
                    ->required(),
                Forms\Components\Select::make('armador_id')
                    ->label('Armador')
                    ->relationship('armador', 'nome')
                    ->required(),
                Forms\Components\Select::make('tamanho')
                    ->label('Tamanho do Conteiner')
                    ->options(array (
  '20 pAs' => '20 pAs',
  '40 pAs' => '40 pAs',
))
                    ->required(),
                Forms\Components\Select::make('tipo_carga')
                    ->label('Tipo de Carga')
                    ->options(array (
  'Seca' => 'Seca',
  'Refrigerada' => 'Refrigerada',
))
                    ->required(),
                Forms\Components\TextInput::make('nome_navio')
                    ->label('Nome do Navio de Embarque')
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Tarifa Portuaria / Frete (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade de TEUs')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Identificacao do Lote/Carga')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo de Registro')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numero_conteiner')
                    ->label('Numero do Conteiner (ISO 6346)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('armador.nome')
                    ->label('Armador')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tamanho')
                    ->label('Tamanho do Conteiner')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_carga')
                    ->label('Tipo de Carga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nome_navio')
                    ->label('Nome do Navio de Embarque')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Tarifa Portuaria / Frete (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade de TEUs')
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
            'index' => Pages\ListConteineres::route('/'),
            'create' => Pages\CreateConteiner::route('/create'),
            'edit' => Pages\EditConteiner::route('/{record}/edit'),
        ];
    }
}