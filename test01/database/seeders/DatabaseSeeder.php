<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        Car::factory()->create([
            'name' => 'Model S',
            'brand' => 'Tesla',
            'price' => 75.00,
            'fuel_type' => 'Electric',
            'color' => 1,
            'type' => 'Sedan',
            'tank' => 100.0,
            'manufacturing_date' => '2023-06-01',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'is_active' => true,
        ]);
        Car::factory()->create([
            'name' => 'Mustang',
            'brand' => 'Ford',
            'price' => 70.00,
            'fuel_type' => 'Gasoline',
            'color' => 2,
            'type' => 'Coupe',
            'tank' => 60.0,
            'manufacturing_date' => '2022-08-15',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'is_active' => true,
        ]);
        Car::factory()->create([
            'name' => 'Civic',
            'brand' => 'Honda',
            'price' => 50.00,
            'fuel_type' => 'Hybrid',
            'color' => 3,
            'type' => 'Sedan',
            'tank' => 50.0,
            'manufacturing_date' => '2021-11-20',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'is_active' => true,
        ]);

        DB::table('customer')->insert(array([
            'name' => 'Lüthi',
            'first_name' => 'Silvan',
            'address' => 'Irgendwo im Nirgendwo',
            'zip' => '1234',
            'city' => 'Nirgendwo',
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => true
        ], [
            'name' => 'Hardegger',
            'first_name' => 'Silas',
            'address' => 'Bsetziweg 10a',
            'zip' => '8500',
            'city' => 'Frauenfeld',
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => true
        ]));

        DB::table('reservation')->insert(array([
            'customer_id' => 2,
            'car_id' => 3,
            'start_date' => now(),
            'end_date' => date_create('2025-01-31'),
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => true
        ], [
            'customer_id' => 1,
            'car_id' => 1,
            'start_date' => now(),
            'end_date' => date_create('2025-01-31'),
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => true
        ]));

        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
