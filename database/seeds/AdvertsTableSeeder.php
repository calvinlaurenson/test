<?php

use Illuminate\Database\Seeder;

class AdvertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title' => 'Pedigree Daschunds for sale', 'description' => 'Available to vetted homes only. Pedigree. Amazing pets and great with kids.', 'price' => '900.00', 'category' => '1', 'user_id' => '2'],
        	['title' => 'Used Ford Fiesta', 'description' => 'Used Ford Fiesta with 27000 miles on the clock. 2016 registration. Full servide history. Apply within. Listed on other sites.', 'price' => '4999.00', 'category' => '2', 'user_id' => '3'],
        	['title' => '2 Bed flat with ensuite', 'description' => 'Based in the heart of Tonbridge, Kent is a newly renovated flat with 2 bedrooms, ensuite, and offstreet parking.', 'price' => '250000.00', 'category' => '3', 'user_id' => '1'],
        	['title' => 'Renault Clio for parts', 'description' => 'This car has been written off and declared unfit for use. This is available for parts', 'price' => '299.00', 'category' => '2', 'user_id' => '2'],
        	];
        	DB::table('adverts')->insert($data);
    }
}
