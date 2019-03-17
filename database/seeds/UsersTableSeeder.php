<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['username' => 'JeanLuc', 'email' => 'captain@enterprise.com'],
        	['username' => 'BenSisko', 'email' => 'captaindeepspace9.com'],
        	['username' => 'Founders', 'email' => 'enemy@dominion.com'],
        ];
        DB::table('users')->insert($data);
    }
}
