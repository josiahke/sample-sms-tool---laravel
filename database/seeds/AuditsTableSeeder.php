<?php

use Illuminate\Database\Seeder;

class AuditsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('audits')->delete();
        
        \DB::table('audits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_type' => 'App\\User',
                'user_id' => 1,
                'event' => 'updated',
                'auditable_type' => 'App\\User',
                'auditable_id' => 1,
                'old_values' => '{"remember_token":"2Vk3D4t7j1s4T37LEAiGjEqtquy2sL484OpZPHCWyQDWErMg5NHfWmGEmm5X"}',
                'new_values' => '{"remember_token":"Ll5sHfvaetGuyIhXRWhQ5gNlqtQizSngENdTDjvBgPuRutbFQ9Y1KKtarOla"}',
                'url' => 'http://127.0.0.1:8000/logout?',
                'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2018-09-17 14:32:03',
                'updated_at' => '2018-09-17 14:32:03',
            ),
            1 => 
            array (
                'id' => 2,
                'user_type' => 'App\\User',
                'user_id' => 1,
                'event' => 'created',
                'auditable_type' => 'App\\SmsLog',
                'auditable_id' => 1,
                'old_values' => '[]',
                'new_values' => '{"sms":"ffd fdf d df","phone":"+254715447407","created_by":1,"status":1}',
                'url' => 'http://127.0.0.1:8000/send/sms?',
                'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2018-09-17 16:39:15',
                'updated_at' => '2018-09-17 16:39:15',
            ),
            2 => 
            array (
                'id' => 3,
                'user_type' => 'App\\User',
                'user_id' => 1,
                'event' => 'created',
                'auditable_type' => 'App\\SmsLog',
                'auditable_id' => 2,
                'old_values' => '[]',
                'new_values' => '{"sms":"dfd fdf dfd f","phone":"+254715447407","created_by":1,"status":1}',
                'url' => 'http://127.0.0.1:8000/send/sms?',
                'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2018-09-17 16:44:33',
                'updated_at' => '2018-09-17 16:44:33',
            ),
        ));
        
        
    }
}