<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
            OncyclesTableSeeder::class,
            OffcyclesTableSeeder::class,
            EmployeesTableSeeder::class,
            PositionsTableSeeder::class,
            // EmployeeDetailsTableSeeder::class,
        ]);
    }
}
