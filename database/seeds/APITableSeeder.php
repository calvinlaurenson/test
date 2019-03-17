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
        	['api_key' => 'fhfdhdthbcfbxdfbcxghfd', 'name' => 'ThatOneAPI', 'active' => true],
        	['api_key' => 'e5yhdfy5thfdhbdryudfh', 'name' => 'AnAPIADayKeepsTheDoctorAway', 'active' => false],
        	['api_key' => '567ugfh6', 'name' => 'Enterprise', 'active' => true],
        	['api_key' => '45h658jr678h5ujh56y', 'name' => 'Qwerty', 'active' => false],
        ];
        DB::table('api_keys')->insert($data);
    }
}
