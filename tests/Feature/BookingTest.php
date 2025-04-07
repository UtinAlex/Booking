<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Entities\Test\Traits\SendPachcaTrait;

class BookingTest extends TestCase
{
    use DatabaseTransactions;

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

    /**
     * Тест запроса.
     * http://book.test/api/bookings
     * 
     * @return void
     */
    public function test_bookings_delete_api_request()
    {
        $response = $this->withHeaders(
            [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            ]
        )->deleteJson(
            '/api/bookings/1', []
        );

        $response->assertStatus(204);
    }
}
