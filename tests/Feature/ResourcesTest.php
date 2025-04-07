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
     * http://book.test/api/resources/7/bookings
     * 
     * @return void
     */
    public function test_resources_booking_get_api_request()
    {
        $response = $this->withHeaders(
            [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            ]
        )->getJson('/api/resources/7/bookings');
        
        $response->assertStatus(200);
        
        $this->assertIsInt($response['data'][0]['id']);
        $this->assertIsInt($response['data'][0]['user_id']);
        $this->assertIsInt($response['data'][0]['resources_id']);
        $this->assertIsString($response['data'][0]['start_time']);
        $this->assertIsString($response['data'][0]['end_time']);
    }
}
