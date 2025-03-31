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
     */
    public function test_resources_post_api_request()
    {
        $response = $this->withHeaders(
            [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            //'Authorization' => 'Bearer ' . config('test.bearer'),
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
}
