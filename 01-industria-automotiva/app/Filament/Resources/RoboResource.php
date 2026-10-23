<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoboResource\Pages;
use App\Models\Robo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RoboResource extends Resource
{
    protected static ?string $model = Robo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Robo';
    protected static ?string $pluralModelLabel = 'Robos';
    protected static ?string $navigationLabel = 'Robos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('modelo')
                    ->label('Modelo do Robo')
                    ->required(),
                Forms\Components\TextInput::make('linha_montagem')
                    ->label('Linha de Montagem')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->label('Status Operacional')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('modelo')
                    ->label('Modelo do Robo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('linha_montagem')
                    ->label('Linha de Montagem')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status Operacional')
                    
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
            'index' => Pages\ListRobos::route('/'),
            'create' => Pages\CreateRobo::route('/create'),
            'edit' => Pages\EditRobo::route('/{record}/edit'),
        ];
    }
}