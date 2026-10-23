<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RemetenteResource\Pages;
use App\Models\Remetente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RemetenteResource extends Resource
{
    protected static ?string $model = Remetente::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Remetente';
    protected static ?string $pluralModelLabel = 'Remetentes';
    protected static ?string $navigationLabel = 'Remetentes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome do Remetente / Empresa')
                    ->required(),
                Forms\Components\TextInput::make('telefone')
                    ->label('Telefone')
                    ->required(),
                Forms\Components\TextInput::make('cidade')
                    ->label('Cidade de Origem')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome do Remetente / Empresa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('telefone')
                    ->label('Telefone')
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('cidade')
                    ->label('Cidade de Origem')
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
            'index' => Pages\ListRemetentes::route('/'),
            'create' => Pages\CreateRemetente::route('/create'),
            'edit' => Pages\EditRemetente::route('/{record}/edit'),
        ];
    }
}