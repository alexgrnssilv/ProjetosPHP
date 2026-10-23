<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultaResource\Pages;
use App\Models\Consulta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConsultaResource extends Resource
{
    protected static ?string $model = Consulta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Consulta';
    protected static ?string $pluralModelLabel = 'Consultas';
    protected static ?string $navigationLabel = 'Consultas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('genitora_id')
                    ->label('Genitora')
                    ->relationship('genitora', 'nome')
                    ->required(),
                Forms\Components\Select::make('bebe_id')
                    ->label('Bebe')
                    ->relationship('bebe', 'nome')
                    ->required(),
                Forms\Components\DateTimePicker::make('data_consulta')
                    ->label('Data e Hora da Consulta (CalendArio)')
                    ->required(),
                Forms\Components\Textarea::make('observacoes')
                    ->label('Observacoes Clinicas / Pre-Natal')
                    ->rows(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('genitora.nome')
                    ->label('Genitora')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bebe.nome')
                    ->label('Bebe')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_consulta')
                    ->label('Data e Hora da Consulta (CalendArio)')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('observacoes')
                    ->label('Observacoes Clinicas / Pre-Natal')
                    ->limit(30),
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
            'index' => Pages\ListConsultas::route('/'),
            'create' => Pages\CreateConsulta::route('/create'),
            'edit' => Pages\EditConsulta::route('/{record}/edit'),
        ];
    }
}