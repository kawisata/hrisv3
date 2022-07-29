<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users-create',
                'display_name' => 'Create Users',
                'description' => 'Create Users',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'users-read',
                'display_name' => 'Read Users',
                'description' => 'Read Users',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'users-update',
                'display_name' => 'Update Users',
                'description' => 'Update Users',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'users-delete',
                'display_name' => 'Delete Users',
                'description' => 'Delete Users',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'payments-create',
                'display_name' => 'Create Payments',
                'description' => 'Create Payments',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'payments-read',
                'display_name' => 'Read Payments',
                'description' => 'Read Payments',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'payments-update',
                'display_name' => 'Update Payments',
                'description' => 'Update Payments',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'payments-delete',
                'display_name' => 'Delete Payments',
                'description' => 'Delete Payments',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'profile-read',
                'display_name' => 'Read Profile',
                'description' => 'Read Profile',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'profile-update',
                'display_name' => 'Update Profile',
                'description' => 'Update Profile',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
        ));
        
        
    }
}