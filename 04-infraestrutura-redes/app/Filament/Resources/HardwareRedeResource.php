<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HardwareRedeResource\Pages;
use App\Models\HardwareRede;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HardwareRedeResource extends Resource
{
    protected static ?string $model = HardwareRede::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Hardware de Rede';
    protected static ?string $pluralModelLabel = 'Hardwares de Rede';
    protected static ?string $navigationLabel = 'Hardwares de Rede';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome do Equipamento (Switch/Roteador)')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo de PatrimAnio/ID')
                    ->required(),
                Forms\Components\Select::make('fabricante_id')
                    ->label('Fabricante')
                    ->relationship('fabricante', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('mac_address')
                    ->label('Endereco MAC')
                    ->required(),
                Forms\Components\TextInput::make('ip_address')
                    ->label('Endereco IP')
                    ->required(),
                Forms\Components\Select::make('voltagem')
                    ->label('Voltagem ElAtrica')
                    ->options(array (
  '110v' => '110v',
  '220v' => '220v',
  'Bivolt' => 'Bivolt',
))
                    ->required(),
                Forms\Components\DatePicker::make('data_ultima_manutencao')
                    ->label('Data da Altima Manutencao Preventiva')
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Preco de AquisiAAo (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade em OperaAAo')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome do Equipamento (Switch/Roteador)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo de PatrimAnio/ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fabricante.nome')
                    ->label('Fabricante')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mac_address')
                    ->label('Endereco MAC')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('Endereco IP')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('voltagem')
                    ->label('Voltagem ElAtrica')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_ultima_manutencao')
                    ->label('Data da Altima Manutencao Preventiva')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preco de AquisiAAo (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade em OperaAAo')
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
            'index' => Pages\ListHardwareRedes::route('/'),
            'create' => Pages\CreateHardwareRede::route('/create'),
            'edit' => Pages\EditHardwareRede::route('/{record}/edit'),
        ];
    }
}