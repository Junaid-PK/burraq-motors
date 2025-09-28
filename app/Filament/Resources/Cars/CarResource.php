<?php

namespace App\Filament\Resources\Cars;

use App\Filament\Resources\Cars\Pages\CreateCar;
use App\Filament\Resources\Cars\Pages\EditCar;
use App\Filament\Resources\Cars\Pages\ListCars;
use App\Models\Car;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use BackedEnum;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationLabel = 'Cars';

    protected static ?string $modelLabel = 'Car';

    protected static ?string $pluralModelLabel = 'Cars';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('make')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        Forms\Components\TextInput::make('model')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('year')
                            ->required()
                            ->numeric()
                            ->minValue(1990)
                            ->maxValue(date('Y') + 1),

                        Forms\Components\TextInput::make('mileage')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->suffix('miles'),

                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('£')
                            ->minValue(0)
                            ->step(0.01),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Vehicle Details')
                    ->schema([
                        Forms\Components\Select::make('fuel_type')
                            ->options([
                                'Petrol' => 'Petrol',
                                'Diesel' => 'Diesel',
                                'Hybrid' => 'Hybrid',
                                'Electric' => 'Electric',
                                'LPG' => 'LPG',
                            ])
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('transmission')
                            ->options([
                                'Manual' => 'Manual',
                                'Automatic' => 'Automatic',
                                'Semi-Automatic' => 'Semi-Automatic',
                            ])
                            ->searchable(),

                        Forms\Components\Select::make('body_type')
                            ->options([
                                'Hatchback' => 'Hatchback',
                                'Saloon' => 'Saloon',
                                'Estate' => 'Estate',
                                'SUV' => 'SUV',
                                'Coupe' => 'Coupe',
                                'Convertible' => 'Convertible',
                                'MPV' => 'MPV',
                                'Pickup' => 'Pickup',
                            ])
                            ->searchable(),

                        Forms\Components\TextInput::make('color')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('engine_size')
                            ->numeric()
                            ->suffix('L')
                            ->minValue(0)
                            ->step(0.1),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\Repeater::make('images')
                            ->schema([
                                Forms\Components\TextInput::make('url')
                                    ->label('Image URL')
                                    ->url()
                                    ->required()
                                    ->placeholder('https://example.com/image.jpg'),
                            ])
                            ->defaultItems(1)
                            ->addActionLabel('Add Image')
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['url'] ?? null)
                            ->reorderableWithButtons()
                            ->cloneable()
                            ->collapsed(false),
                    ]),

                Forms\Components\Section::make('Description & Contact')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull()
                            ->placeholder('Enter a detailed description of the vehicle...'),

                        Forms\Components\TextInput::make('contact_email')
                            ->required()
                            ->email()
                            ->maxLength(255)
                            ->placeholder('contactus@burraqmotors.co.uk'),

                        Forms\Components\TextInput::make('contact_phone')
                            ->required()
                            ->tel()
                            ->maxLength(255)
                            ->placeholder('+44 7828 530702'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Car')
                            ->helperText('Featured cars appear on the homepage'),

                        Forms\Components\Toggle::make('is_sold')
                            ->label('Sold')
                            ->helperText('Mark as sold to hide from listings'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('main_image')
                    ->label('Image')
                    ->size(80)
                    ->defaultImageUrl('https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')
                    ->circular(),

                Tables\Columns\TextColumn::make('make')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Bold),

                Tables\Columns\TextColumn::make('model')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Medium),

                Tables\Columns\TextColumn::make('year')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('mileage')
                    ->formatStateUsing(fn ($state) => number_format($state) . ' miles')
                    ->sortable()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('price')
                    ->formatStateUsing(fn ($state) => '£' . number_format($state, 0))
                    ->sortable()
                    ->weight(FontWeight::Bold)
                    ->color('success'),

                Tables\Columns\TextColumn::make('fuel_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Electric' => 'success',
                        'Hybrid' => 'warning',
                        'Diesel' => 'gray',
                        default => 'info',
                    }),

                Tables\Columns\TextColumn::make('transmission')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured')
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-star')
                    ->trueColor('warning')
                    ->falseColor('gray'),

                Tables\Columns\IconColumn::make('is_sold')
                    ->boolean()
                    ->label('Sold')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('make')
                    ->options([
                        'BMW' => 'BMW',
                        'Mercedes-Benz' => 'Mercedes-Benz',
                        'Audi' => 'Audi',
                        'Volkswagen' => 'Volkswagen',
                        'Ford' => 'Ford',
                        'Toyota' => 'Toyota',
                        'Honda' => 'Honda',
                        'Nissan' => 'Nissan',
                        'Mazda' => 'Mazda',
                        'Subaru' => 'Subaru',
                        'Lexus' => 'Lexus',
                        'Infiniti' => 'Infiniti',
                    ])
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('fuel_type')
                    ->options([
                        'Petrol' => 'Petrol',
                        'Diesel' => 'Diesel',
                        'Hybrid' => 'Hybrid',
                        'Electric' => 'Electric',
                        'LPG' => 'LPG',
                    ])
                    ->searchable(),

                Tables\Filters\SelectFilter::make('transmission')
                    ->options([
                        'Manual' => 'Manual',
                        'Automatic' => 'Automatic',
                        'Semi-Automatic' => 'Semi-Automatic',
                    ]),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),

                Tables\Filters\TernaryFilter::make('is_sold')
                    ->label('Sold'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
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
            'index' => ListCars::route('/'),
            'create' => CreateCar::route('/create'),
            'edit' => EditCar::route('/{record}/edit'),
        ];
    }
}
