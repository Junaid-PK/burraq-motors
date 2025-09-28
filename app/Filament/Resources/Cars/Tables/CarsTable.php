<?php

namespace App\Filament\Resources\Cars\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class CarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('main_image')
                    ->label('Image')
                    ->size(60)
                    ->defaultImageUrl('https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'),
                TextColumn::make('make')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('model')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('year')
                    ->sortable(),
                TextColumn::make('mileage')
                    ->formatStateUsing(fn ($state) => number_format($state) . ' miles')
                    ->sortable(),
                TextColumn::make('price')
                    ->formatStateUsing(fn ($state) => '£' . number_format($state, 0))
                    ->sortable(),
                TextColumn::make('fuel_type'),
                TextColumn::make('transmission'),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
                IconColumn::make('is_sold')
                    ->boolean()
                    ->label('Sold'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('make')
                    ->options([
                        'BMW' => 'BMW',
                        'Mercedes-Benz' => 'Mercedes-Benz',
                        'Audi' => 'Audi',
                        'Volkswagen' => 'Volkswagen',
                        'Ford' => 'Ford',
                        'Toyota' => 'Toyota',
                        'Honda' => 'Honda',
                        'Nissan' => 'Nissan',
                    ]),
                SelectFilter::make('fuel_type')
                    ->options([
                        'Petrol' => 'Petrol',
                        'Diesel' => 'Diesel',
                        'Hybrid' => 'Hybrid',
                        'Electric' => 'Electric',
                        'LPG' => 'LPG',
                    ]),
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                TernaryFilter::make('is_sold')
                    ->label('Sold'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
