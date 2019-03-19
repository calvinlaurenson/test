<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class APITest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function getAllAdverts()
    {
        $this->get('/api/adverts/0');
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'outcome' => 
            [
                'status',
                'message',
                'call_id',
                'code'
            ],
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'price',
                    'category',
                    'user_id',
                    'created_at',
                    'updated_at'
                ],
            ]
        ]);

    }
}
