<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStore()
    {
        $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'password',
        ]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vZXZlbnRzLnRlc3QvYXBpL2xvZ2luIiwiaWF0IjoxNjYxMDI5MjI5LCJleHAiOjE2NjEwMzI4MjksIm5iZiI6MTY2MTAyOTIyOSwianRpIjoiWjJFUWx6M3EyOFJFSDJTOCIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.D8RgEHdSKmw5K1Igt3R769kGoTUoWIPsxK0WE6gVPnY',
        ])
            ->post('api/events', [
                "title" => "Year",
                "date_start" => "2022-12-23 00:00:00",
                "date_end" => "2023-01-07 00:00:00"
            ]);

        $response->assertStatus(200);
    }
}
