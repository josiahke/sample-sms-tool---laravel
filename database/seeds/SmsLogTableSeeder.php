<?php

use Illuminate\Database\Seeder;

class SmsLogTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sms_log')->delete();
        
        \DB::table('sms_log')->insert(array (
            0 => 
            array (
                'id' => 1,
                'phone' => '+254715447407',
                'sms' => 'ffd fdf d df',
                'status' => 1,
                'created_by' => 1,
                'created_at' => '2018-09-17 16:39:15',
                'updated_at' => '2018-09-17 16:39:15',
            ),
            1 => 
            array (
                'id' => 2,
                'phone' => '+254715447407',
                'sms' => 'dfd fdf dfd f',
                'status' => 1,
                'created_by' => 1,
                'created_at' => '2018-09-17 16:44:33',
                'updated_at' => '2018-09-17 16:44:33',
            ),
        ));
        
        
    }
}