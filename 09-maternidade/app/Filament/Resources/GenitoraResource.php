<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GenitoraResource\Pages;
use App\Models\Genitora;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GenitoraResource extends Resource
{
    protected static ?string $model = Genitora::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Genitora';
    protected static ?string $pluralModelLabel = 'Genitoras';
    protected static ?string $navigationLabel = 'Genitoras';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome da Genitora (Mae)')
                    ->required(),
                Forms\Components\TextInput::make('cpf')
                    ->label('CPF da Genitora')
                    ->required(),
                Forms\Components\TextInput::make('telefone')
                    ->label('Telefone / WhatsApp')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome da Genitora (Mae)')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cpf')
                    ->label('CPF da Genitora')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('telefone')
                    ->label('Telefone / WhatsApp')
                    
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
            'index' => Pages\ListGenitoras::route('/'),
            'create' => Pages\CreateGenitora::route('/create'),
            'edit' => Pages\EditGenitora::route('/{record}/edit'),
        ];
    }
}