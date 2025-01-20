<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $corporate = Customer::where('id', 1)->first();
        if (!$corporate) Customer::create([
            'id' => 1,
            'name' => 'Corporate',
            'first_name' => 'Customer',
            'address' => '',
            'zip' => 0,
            'city' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => true
        ]);

        $silvan = Customer::where('id', 2)->first();
        if (!$silvan) Customer::create([
            'id' => 2,
            'name' => 'Lüthi',
            'first_name' => 'Silvan',
            'address' => '',
            'zip' => 0,
            'city' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => true
        ]);

        $silas = Customer::where('id', 3)->first();
        if (!$silas) Customer::create([
            'id' => 3,
            'name' => 'Hardegger',
            'first_name' => 'Silas',
            'address' => '',
            'zip' => 0,
            'city' => '',
            'created_at' => now(),
            'updated_at' => now(),
            'is_active' => true
        ]);
    }
}
