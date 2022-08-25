<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
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
    public function testStoreEvent()
    {
        $token = $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'password',
        ]);
//        dd($token['access_token']);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token['access_token'],
        ])
            ->post('api/events', [
                "title" => "Year",
                "date_start" => "2022-12-23 00:00:00",
                "date_end" => "2023-01-07 00:00:00"
            ]);

        $response->assertStatus(200);
    }

    public function testShowEvent()
    {
        $token = $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'password',
        ]);

        $this->withHeaders([
            'Authorization' => 'Bearer' . $token['access_token'],
        ]);

        $event = Event::take(1)->first();

        $response = $this->get('api/events/' . $event->id);
        $response->assertOk();

    }

    public function testDeleteEvent()
    {
        $token = $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'password',
        ]);

        $this->withHeaders([
            'Authorization' => 'Bearer' . $token['access_token'],
        ]);
        $event = Event::take(1)->first();

        $response = $this->delete('api/events/' . $event->id);

        $response->assertOk();
    }
}
