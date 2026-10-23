<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacoteResource\Pages;
use App\Models\Pacote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PacoteResource extends Resource
{
    protected static ?string $model = Pacote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Pacote';
    protected static ?string $pluralModelLabel = 'Pacotes';
    protected static ?string $navigationLabel = 'Pacotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Descricao do Conteudo')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo Interno')
                    ->required(),
                Forms\Components\TextInput::make('codigo_rastreio')
                    ->label('Codigo de Rastreio (Tracking)')
                    ->required(),
                Forms\Components\Select::make('remetente_id')
                    ->label('Remetente')
                    ->relationship('remetente', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('destinatario')
                    ->label('Nome do DestinatArio')
                    ->required(),
                Forms\Components\TextInput::make('peso_kg')
                    ->label('Peso (Kg)')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('status_entrega')
                    ->label('Status de Entrega')
                    ->options(array (
  'Pendente' => 'Pendente',
  'Em Rota' => 'Em Rota',
  'Entregue' => 'Entregue',
))
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Valor do Frete/Seguro (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Volumes / Pacotes')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Descricao do Conteudo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo Interno')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo_rastreio')
                    ->label('Codigo de Rastreio (Tracking)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('remetente.nome')
                    ->label('Remetente')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('destinatario')
                    ->label('Nome do DestinatArio')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('peso_kg')
                    ->label('Peso (Kg)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_entrega')
                    ->label('Status de Entrega')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Valor do Frete/Seguro (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Volumes / Pacotes')
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
            'index' => Pages\ListPacotes::route('/'),
            'create' => Pages\CreatePacote::route('/create'),
            'edit' => Pages\EditPacote::route('/{record}/edit'),
        ];
    }
}