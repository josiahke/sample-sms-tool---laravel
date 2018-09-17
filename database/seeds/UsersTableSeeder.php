<?php

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
                'name' => 'admin',
                'email' => 'admin@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$X5UXC77o9W8VWfQiM8K/p.PVGDGES1RK3JKLzYgzZb0SRkXX19E4C',
                'remember_token' => 'Ll5sHfvaetGuyIhXRWhQ5gNlqtQizSngENdTDjvBgPuRutbFQ9Y1KKtarOla',
                'created_at' => '2018-09-17 14:10:36',
                'updated_at' => '2018-09-17 14:10:36',
            ),
        ));
        
        
    }
}