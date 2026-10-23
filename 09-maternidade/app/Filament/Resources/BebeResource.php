<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BebeResource\Pages;
use App\Models\Bebe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BebeResource extends Resource
{
    protected static ?string $model = Bebe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Bebe';
    protected static ?string $pluralModelLabel = 'Bebes';
    protected static ?string $navigationLabel = 'Bebes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->label('Nome do Bebe')
                    ->required(),
                Forms\Components\Select::make('genitora_id')
                    ->label('Mae / Genitora')
                    ->relationship('genitora', 'nome')
                    ->required(),
                Forms\Components\DatePicker::make('data_nascimento')
                    ->label('Data Prevista ou Efetiva de Nascimento')
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome do Bebe')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('genitora.nome')
                    ->label('Mae / Genitora')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_nascimento')
                    ->label('Data Prevista ou Efetiva de Nascimento')
                    ->date('d/m/Y')
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
            'index' => Pages\ListBebes::route('/'),
            'create' => Pages\CreateBebe::route('/create'),
            'edit' => Pages\EditBebe::route('/{record}/edit'),
        ];
    }
}