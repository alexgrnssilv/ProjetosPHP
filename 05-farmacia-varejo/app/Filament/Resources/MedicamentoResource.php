<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicamentoResource\Pages;
use App\Models\Medicamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MedicamentoResource extends Resource
{
    protected static ?string $model = Medicamento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Medicamento';
    protected static ?string $pluralModelLabel = 'Medicamentos';
    protected static ?string $navigationLabel = 'Medicamentos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome Comercial')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo / EAN / ID')
                    ->required(),
                Forms\Components\Select::make('fabricante_id')
                    ->label('Laboratorio Fabricante')
                    ->relationship('fabricante', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('principio_ativo')
                    ->label('PrincApio Ativo')
                    ->required(),
                Forms\Components\Toggle::make('controlado_tarja_preta')
                    ->label('Controlado / Tarja Preta (Sim/NAo)'),
                Forms\Components\TextInput::make('lote')
                    ->label('Lote de FabricaAAo')
                    ->required(),
                Forms\Components\DatePicker::make('data_validade')
                    ->label('Data de Validade')
                    ->required(),
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
                    ->label('Nome Comercial')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo / EAN / ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fabricante.nome')
                    ->label('Laboratorio Fabricante')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('principio_ativo')
                    ->label('PrincApio Ativo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('controlado_tarja_preta')
                    ->label('Controlado / Tarja Preta (Sim/NAo)')
                    ->boolean(),
                Tables\Columns\TextColumn::make('lote')
                    ->label('Lote de FabricaAAo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_validade')
                    ->label('Data de Validade')
                    ->date('d/m/Y')
                    ->sortable(),
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
            'index' => Pages\ListMedicamentos::route('/'),
            'create' => Pages\CreateMedicamento::route('/create'),
            'edit' => Pages\EditMedicamento::route('/{record}/edit'),
        ];
    }
}