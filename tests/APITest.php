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
        $header = ['api_token' => '567ugfh6'];
        $response = $this->json('GET', '/api/adverts/1', [], $header);
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
                    'description',
                    'price',
                    'category',
                    'user_id',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);

    }


    /** @test */
    public function getAllCategories()
    {
        $header = ['api_token' => '567ugfh6'];
        $response = $this->json('GET', '/api/categories/1', [], $header);
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
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);

    }

    /** @test */
    public function getAccount()
    {
        $header = ['api_token' => '567ugfh6'];
        $response = $this->json('GET', '/api/accounts/1', [], $header);
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
                    'username',
                    'email',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);
    }

    

}
