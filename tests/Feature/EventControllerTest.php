<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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
        $this->login();
        $response = $this->post('api/events', [
            "title" => "Year",
            "date_start" => "2022-12-23 00:00:00",
            "date_end" => "2023-01-07 00:00:00"
        ]);

        $response->assertStatus(200);
    }

    public function testShowEvent()
    {
        $this->login();
        $event = Event::take(1)->first();

        $response = $this->get('api/events/' . $event->id);
        $response->assertOk();

    }

    public function testDeleteEvent()
    {
        $this->login();
        $event = Event::take(1)->first();

        $response = $this->delete('api/events/' . $event->id);

        $response->assertOk();
    }
}
