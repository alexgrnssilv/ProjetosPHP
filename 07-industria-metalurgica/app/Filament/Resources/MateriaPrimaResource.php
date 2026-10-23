<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriaPrimaResource\Pages;
use App\Models\MateriaPrima;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MateriaPrimaResource extends Resource
{
    protected static ?string $model = MateriaPrima::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Materia-Prima';
    protected static ?string $pluralModelLabel = 'Materias-Primas';
    protected static ?string $navigationLabel = 'Materias-Primas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome da Materia-Prima')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo do Lote/ID')
                    ->required(),
                Forms\Components\Select::make('fornecedor_id')
                    ->label('Fornecedor')
                    ->relationship('fornecedor', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('tipo_liga')
                    ->label('Tipo de Liga MetAlica')
                    ->required(),
                Forms\Components\TextInput::make('ponto_fusao_celsius')
                    ->label('Ponto de Fusao (ACC)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('peso_toneladas')
                    ->label('Peso (Toneladas)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Preco por Tonelada (R$)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade em Lotes')
                    ->numeric()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome da Materia-Prima')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo do Lote/ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fornecedor.nome')
                    ->label('Fornecedor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_liga')
                    ->label('Tipo de Liga MetAlica')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ponto_fusao_celsius')
                    ->label('Ponto de Fusao (ACC)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('peso_toneladas')
                    ->label('Peso (Toneladas)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preco por Tonelada (R$)')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Quantidade em Lotes')
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
            'index' => Pages\ListMateriaPrimas::route('/'),
            'create' => Pages\CreateMateriaPrima::route('/create'),
            'edit' => Pages\EditMateriaPrima::route('/{record}/edit'),
        ];
    }
}