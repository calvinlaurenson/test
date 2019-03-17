<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['name' => 'Pets'],
        	['name' => 'Cats'],
        	['name' => 'Property'],
        ];

        DB::table('categories')->insert($data);
    }
}
