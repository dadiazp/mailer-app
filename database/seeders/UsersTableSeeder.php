<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Daniel',
                'email' => 'dadiazp98@gmail.com',
                'id_number' => '12345678',
                'password' => '$2y$10$E79G7zQgLuKgF5ujCiQXouyodzap.frWgCeSgZdXJ.k65B9kN4Y.6',
                'birthday' => '1998-02-03',
                'phone_number' => '555555',
                'is_admin' => 1,
                'is_active' => 1,
                'remember_token' => NULL,
                'created_at' => '2022-02-23 23:15:03',
                'updated_at' => '2022-02-23 23:15:03',
                'city_id' => 1,
            ),
        ));
        
        
    }
}