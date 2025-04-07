<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Entities\Test\Traits\SendPachcaTrait;

class ResourcesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Тест запроса.
     * http://book.test/api/resources
     * 
     * @return void
     */
    public function test_resources_post_api_request()
    {
        $response = $this->withHeaders(
            [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            ]
        )->postJson(
            '/api/resources', 
            [
                "name" => "BMW",
                "type" => "Автомобиль",
                "description" => "BMW X7",
                ]
        );

        $response->assertStatus(201);

        $this->assertIsInt($response['id']);
        $this->assertIsString($response['name']);
        $this->assertIsString($response['type']);
        $this->assertIsString($response['description']);

    }

    /**
     * Тест запроса.
     * http://book.test/api/resources
     * 
     * @return void
     */
    public function test_resources_get_api_request()
    {
        $response = $this->withHeaders(
            [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            ]
        )->getJson('/api/resources');
        
        $response->assertStatus(200);
        
        $this->assertIsInt($response['data'][0]['id']);
        $this->assertIsString($response['data'][0]['name']);
        $this->assertIsString($response['data'][0]['type']);
        $this->assertIsString($response['data'][0]['description']);
        $this->assertIsString($response['data'][0]['created_at']);
        $this->assertIsString($response['data'][0]['updated_at']);
    }

    /**
     * Тест запроса.
     * http://book.test/api/bookings
     * 
     * @return void
     */
    public function test_bookings_post_api_request()
    {
        $response = $this->withHeaders(
            [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            ]
        )->postJson(
            '/api/bookings', 
            [
                "userId" => 1,
                "resourcesId" => 9,
                "startTime" => "2125-04-07T17:30:00+03:00",
                "endTime" => "2125-04-07T17:30:00+03:00"
                ]
        );

        $response->assertStatus(201);

        $this->assertIsInt($response['id']);
        $this->assertIsInt($response['user_id']);
        $this->assertIsInt($response['resources_id']);
        $this->assertIsString($response['start_time']);
        $this->assertIsString($response['end_time']);
    }
}
