<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'make' => 'BMW',
                'model' => '3 Series',
                'year' => 2020,
                'mileage' => 25000,
                'price' => 28950.00,
                'description' => 'Excellent condition BMW 3 Series with full service history. Low mileage and well maintained.',
                'images' => [
                    'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'body_type' => 'Saloon',
                'color' => 'Black',
                'engine_size' => 2.0,
                'is_featured' => true,
                'is_sold' => false,
                'contact_email' => 'sales@burraqmotors.com',
                'contact_phone' => '+44 161 123 4567',
            ],
            [
                'make' => 'Mercedes-Benz',
                'model' => 'C-Class',
                'year' => 2019,
                'mileage' => 32000,
                'price' => 31950.00,
                'description' => 'Luxury Mercedes C-Class with premium interior and advanced safety features.',
                'images' => [
                    'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'fuel_type' => 'Diesel',
                'transmission' => 'Automatic',
                'body_type' => 'Saloon',
                'color' => 'Silver',
                'engine_size' => 2.1,
                'is_featured' => true,
                'is_sold' => false,
                'contact_email' => 'sales@burraqmotors.com',
                'contact_phone' => '+44 161 123 4567',
            ],
            [
                'make' => 'Audi',
                'model' => 'A4',
                'year' => 2021,
                'mileage' => 18000,
                'price' => 34950.00,
                'description' => 'Nearly new Audi A4 with cutting-edge technology and exceptional build quality.',
                'images' => [
                    'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'fuel_type' => 'Petrol',
                'transmission' => 'Automatic',
                'body_type' => 'Saloon',
                'color' => 'White',
                'engine_size' => 2.0,
                'is_featured' => true,
                'is_sold' => false,
                'contact_email' => 'sales@burraqmotors.com',
                'contact_phone' => '+44 161 123 4567',
            ],
            [
                'make' => 'Volkswagen',
                'model' => 'Golf',
                'year' => 2018,
                'mileage' => 45000,
                'price' => 18950.00,
                'description' => 'Reliable Volkswagen Golf with excellent fuel economy and practical design.',
                'images' => [
                    'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'body_type' => 'Hatchback',
                'color' => 'Blue',
                'engine_size' => 1.4,
                'is_featured' => false,
                'is_sold' => false,
                'contact_email' => 'sales@burraqmotors.com',
                'contact_phone' => '+44 161 123 4567',
            ],
            [
                'make' => 'Ford',
                'model' => 'Focus',
                'year' => 2017,
                'mileage' => 52000,
                'price' => 15950.00,
                'description' => 'Well-maintained Ford Focus with great handling and comfortable ride.',
                'images' => [
                    'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'fuel_type' => 'Petrol',
                'transmission' => 'Manual',
                'body_type' => 'Hatchback',
                'color' => 'Red',
                'engine_size' => 1.6,
                'is_featured' => false,
                'is_sold' => false,
                'contact_email' => 'sales@burraqmotors.com',
                'contact_phone' => '+44 161 123 4567',
            ],
            [
                'make' => 'Toyota',
                'model' => 'Prius',
                'year' => 2020,
                'mileage' => 28000,
                'price' => 22950.00,
                'description' => 'Eco-friendly Toyota Prius hybrid with excellent fuel efficiency and low emissions.',
                'images' => [
                    'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                'fuel_type' => 'Hybrid',
                'transmission' => 'Automatic',
                'body_type' => 'Hatchback',
                'color' => 'Silver',
                'engine_size' => 1.8,
                'is_featured' => false,
                'is_sold' => false,
                'contact_email' => 'sales@burraqmotors.com',
                'contact_phone' => '+44 161 123 4567',
            ],
        ];

        foreach ($cars as $carData) {
            Car::create($carData);
        }
    }
}
