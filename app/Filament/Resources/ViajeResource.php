<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ViajeResource\Pages;
use App\Filament\Resources\ViajeResource\RelationManagers;
use App\Models\Viaje;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ViajeResource extends Resource
{
    protected static ?string $model = Viaje::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('camion_id')
                    ->relationship('camion', 'id')
                    ->required(),
                Forms\Components\Select::make('chofer_id')
                    ->relationship('chofer', 'id')
                    ->required(),
                Forms\Components\Select::make('cliente_id')
                    ->relationship('cliente', 'id')
                    ->required(),
                Forms\Components\Textarea::make('ruta')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('fecha_salida')
                    ->required(),
                Forms\Components\DateTimePicker::make('fecha_llegada')
                    ->required(),
                Forms\Components\TextInput::make('estado')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('camion.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('chofer.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cliente.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_salida')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_llegada')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado')
                    ->searchable(),
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
            'index' => Pages\ListViajes::route('/'),
            'create' => Pages\CreateViaje::route('/create'),
            'edit' => Pages\EditViaje::route('/{record}/edit'),
        ];
    }
}
