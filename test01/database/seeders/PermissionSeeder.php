<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $admin = Role::findOrCreate('admin');
        $sales = Role::findOrCreate('sales');
        $user = Role::findOrCreate('user');

        $editCars = Permission::findOrCreate('edit-cars');
        $viewCars = Permission::findOrCreate('view-cars');
        $deleteCars = Permission::findOrCreate('delete-cars');
        $createCars = Permission::findOrCreate('create-cars');

        $admin->givePermissionTo(Permission::all());
        $user->givePermissionTo($viewCars);
        $sales->givePermissionTo($viewCars, $editCars);
    }
}
