<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CombustibleResource\Pages;
use App\Filament\Resources\CombustibleResource\RelationManagers;
use App\Models\Combustible;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CombustibleResource extends Resource
{
    protected static ?string $model = Combustible::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('viaje_id')
                    ->relationship('viaje', 'id')
                    ->required(),
                Forms\Components\TextInput::make('cantidad_litros')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('costo')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('fecha')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('viaje.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cantidad_litros')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('costo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCombustibles::route('/'),
            'create' => Pages\CreateCombustible::route('/create'),
            'edit' => Pages\EditCombustible::route('/{record}/edit'),
        ];
    }
}
