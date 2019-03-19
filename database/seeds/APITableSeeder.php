<?php

use Illuminate\Database\Seeder;

class APITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['api_key' => 'fhfdhdthbcfbxdfbcxghfd', 'name' => 'ThatOneAPI', 'active' => true, "calls_per_minute" => 10, 'total_calls_per_minute' => 0, 'time_of_last_call' => 0],
        	['api_key' => 'e5yhdfy5thfdhbdryudfh', 'name' => 'AnAPIADayKeepsTheDoctorAway', 'active' => false, "calls_per_minute" => 0, 'total_calls_per_minute' => 0, 'time_of_last_call' => 0],
        	['api_key' => '567ugfh6', 'name' => 'Enterprise', 'active' => true, "calls_per_minute" => 10, 'total_calls_per_minute' => 0, 'time_of_last_call' => 0],
        	['api_key' => '45h658jr678h5ujh56y', 'name' => 'Qwerty', 'active' => false, "calls_per_minute" => 10, 'total_calls_per_minute' => 0, 'time_of_last_call' => 0],
        ];
        DB::table('api_keys')->insert($data);
    }
}
