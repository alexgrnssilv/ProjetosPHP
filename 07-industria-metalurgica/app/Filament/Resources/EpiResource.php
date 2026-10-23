<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EpiResource\Pages;
use App\Models\Epi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EpiResource extends Resource
{
    protected static ?string $model = Epi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'EPI';
    protected static ?string $pluralModelLabel = 'EPIs';
    protected static ?string $navigationLabel = 'EPIs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome do EPI')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->label('Codigo do EPI')
                    ->required(),
                Forms\Components\Select::make('fornecedor_id')
                    ->label('Fornecedor')
                    ->relationship('fornecedor', 'nome')
                    ->required(),
                Forms\Components\TextInput::make('numero_ca')
                    ->label('Certificado de AprovaAAo (CA)')
                    ->required(),
                Forms\Components\DatePicker::make('validade_ca')
                    ->label('Data de Validade do CA')
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Preco Unitario (R$)')
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
                    ->label('Nome do EPI')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->label('Codigo do EPI')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fornecedor.nome')
                    ->label('Fornecedor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numero_ca')
                    ->label('Certificado de AprovaAAo (CA)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('validade_ca')
                    ->label('Data de Validade do CA')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preco Unitario (R$)')
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
            'index' => Pages\ListEpis::route('/'),
            'create' => Pages\CreateEpi::route('/create'),
            'edit' => Pages\EditEpi::route('/{record}/edit'),
        ];
    }
}