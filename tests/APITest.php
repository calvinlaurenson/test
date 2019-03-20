<?php



class APITest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    

    /** @test */
    public function basicTest() {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function getAllAdverts()
    {
        $params = ["amount" => 2];
        $response = $this->call('get', 'adverts/index/1', $params);
        $this->assertEquals(200, $response->status());

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


    /** @test */
    public function getAllCategories()
    {
        $params = ["amount" => 2];
        $response = $this->call('get', 'categories/2');
        $this->assertEquals(200, $response->status());

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

    /** @test */
    public function getAccount()
    {
        $params = ["user_id" => 2];
        $response = $this->call('get', 'accounts/2');
        $this->assertEquals(200, $response->status());

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

    /** @test */
    public function getAccountAdverts()
    {
        $params = ["user_id" => 2, "latest" => true];
        $response = $this->call('get', 'user_adverts/2/true');
        $this->assertEquals(200, $response->status());

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
