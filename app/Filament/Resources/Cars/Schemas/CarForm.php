<?php

namespace App\Filament\Resources\Cars\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Schemas\Schema;

class CarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('make')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('model')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('year')
                            ->required()
                            ->numeric()
                            ->minValue(1990)
                            ->maxValue(date('Y')),
                        TextInput::make('mileage')
                            ->required()
                            ->numeric()
                            ->minValue(0),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('£')
                            ->minValue(0),
                    ])
                    ->columns(2),

                Section::make('Vehicle Details')
                    ->schema([
                        Select::make('fuel_type')
                            ->options([
                                'Petrol' => 'Petrol',
                                'Diesel' => 'Diesel',
                                'Hybrid' => 'Hybrid',
                                'Electric' => 'Electric',
                                'LPG' => 'LPG',
                            ]),
                        Select::make('transmission')
                            ->options([
                                'Manual' => 'Manual',
                                'Automatic' => 'Automatic',
                                'Semi-Automatic' => 'Semi-Automatic',
                            ]),
                        Select::make('body_type')
                            ->options([
                                'Hatchback' => 'Hatchback',
                                'Saloon' => 'Saloon',
                                'Estate' => 'Estate',
                                'SUV' => 'SUV',
                                'Coupe' => 'Coupe',
                                'Convertible' => 'Convertible',
                                'MPV' => 'MPV',
                                'Pickup' => 'Pickup',
                            ]),
                        TextInput::make('color')
                            ->maxLength(255),
                        TextInput::make('engine_size')
                            ->numeric()
                            ->suffix('L')
                            ->minValue(0),
                    ])
                    ->columns(2),

                Section::make('Images')
                    ->schema([
                        Repeater::make('images')
                            ->schema([
                                TextInput::make('url')
                                    ->label('Image URL')
                                    ->url()
                                    ->required(),
                            ])
                            ->defaultItems(1)
                            ->addActionLabel('Add Image')
                            ->collapsible(),
                    ]),

                Section::make('Description & Contact')
                    ->schema([
                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),
                        TextInput::make('contact_email')
                            ->required()
                            ->email()
                            ->maxLength(255),
                        TextInput::make('contact_phone')
                            ->required()
                            ->tel()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_featured')
                            ->label('Featured Car'),
                        Toggle::make('is_sold')
                            ->label('Sold'),
                    ])
                    ->columns(2),
            ]);
    }
}
