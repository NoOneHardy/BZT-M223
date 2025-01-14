<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $admin = User::where('email', 'admin@admin.ch')->first();
        if (!$admin) $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.ch',
            'password' => bcrypt('admin')
        ]);

        $sales = User::where('email', 'sales@sales.ch')->first();
        if (!$sales) $sales = User::create([
            'name' => 'Sales',
            'email' => 'sales@sales.ch',
            'password' => bcrypt('sales')
        ]);

        $user = User::where('email', 'user@user.ch')->first();
        if (!$user) $user = User::create([
            'name' => 'User',
            'email' => 'user@user.ch',
            'password' => bcrypt('user')
        ]);

        $admin->assignRole('admin');
        $sales->assignRole('sales');
        $user->assignRole('user');

    }
}
