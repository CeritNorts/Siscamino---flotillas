<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TripResource\Pages;
use App\Filament\Resources\TripResource\RelationManagers;
use App\Models\Trip;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TripResource extends Resource
{
    protected static ?string $model = Trip::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('vehicle_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('driver_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('client_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('trip_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('origin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('destination')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('route_details')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('scheduled_departure')
                    ->required(),
                Forms\Components\DateTimePicker::make('actual_departure'),
                Forms\Components\DateTimePicker::make('estimated_arrival')
                    ->required(),
                Forms\Components\DateTimePicker::make('actual_arrival'),
                Forms\Components\TextInput::make('distance')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('load_weight')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('load_type')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('initial_odometer')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('final_odometer')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('scheduled'),
                Forms\Components\TextInput::make('estimated_cost')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('actual_cost')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('revenue')
                    ->numeric()
                    ->default(null),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vehicle_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('driver_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('client_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('trip_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('origin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('destination')
                    ->searchable(),
                Tables\Columns\TextColumn::make('scheduled_departure')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_departure')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estimated_arrival')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_arrival')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('distance')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('load_weight')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('load_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('initial_odometer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('final_odometer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estimated_cost')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_cost')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('revenue')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
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
            'index' => Pages\ListTrips::route('/'),
            'create' => Pages\CreateTrip::route('/create'),
            'edit' => Pages\EditTrip::route('/{record}/edit'),
        ];
    }
}
