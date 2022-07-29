<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'superadministrator',
                'display_name' => 'Superadministrator',
                'description' => 'Superadministrator',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'administrator',
                'display_name' => 'Administrator',
                'description' => 'Administrator',
                'created_at' => '2022-01-12 22:14:38',
                'updated_at' => '2022-01-12 22:14:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'User',
                'created_at' => '2022-01-12 22:14:39',
                'updated_at' => '2022-01-12 22:14:39',
            ),
        ));
        
        
    }
}