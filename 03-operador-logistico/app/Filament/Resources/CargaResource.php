<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CargaResource\Pages;
use App\Models\Carga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CargaResource extends Resource
{
    protected static ?string $model = Carga::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Carga';
    protected static ?string $pluralModelLabel = 'Cargas';
    protected static ?string $navigationLabel = 'Cargas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Identificacao da Carga')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo de Rastreio/ID')
                    ->required(),
                Forms\Components\Select::make('fornecedor_id')
                    ->label('Fornecedor/Remetente')
                    ->relationship('fornecedor', 'nome')
                    ->required(),
                Forms\Components\Select::make('tipo_embalagem')
                    ->label('Tipo (Pallet/Caixa)')
                    ->options(array (
  'Pallet' => 'Pallet',
  'Caixa' => 'Caixa',
))
                    ->required(),
                Forms\Components\TextInput::make('peso_kg')
                    ->label('Peso (Kg)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('dimensoes')
                    ->label('Dimensoes (AxLxP cm)')
                    ->required(),
                Forms\Components\TextInput::make('destino')
                    ->label('Destino da Carga')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Status da Carga')
                    ->options(array (
  'Recebido' => 'Recebido',
  'Em Processamento' => 'Em Processamento',
  'Expedido' => 'Expedido',
))
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Valor Declarado (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade de Unidades')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Identificacao da Carga')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo de Rastreio/ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fornecedor.nome')
                    ->label('Fornecedor/Remetente')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_embalagem')
                    ->label('Tipo (Pallet/Caixa)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('peso_kg')
                    ->label('Peso (Kg)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('dimensoes')
                    ->label('Dimensoes (AxLxP cm)')
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('destino')
                    ->label('Destino da Carga')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status da Carga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Valor Declarado (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade de Unidades')
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
            'index' => Pages\ListCargas::route('/'),
            'create' => Pages\CreateCarga::route('/create'),
            'edit' => Pages\EditCarga::route('/{record}/edit'),
        ];
    }
}