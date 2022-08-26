<?php

namespace Tests\Feature;


use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class UserControllerTest extends TestCase
{


    use DatabaseMigrations;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStoreUser()
    {
        $this->login();
        $response = $this->post('api/users', [
            'name' => 'Dima',
            'surname' => 'Mirny',
            'phone' => '+380978943827',
            'email' => 'mirnывавas@gmail.com',
            'password' => 'secret',
        ]);

        $response->assertStatus(200);
    }

    public function testShowUser()
    {
        $this->login();
        $user = User::take(1)->first();

        $response = $this->get('api/users/' . $user->id);
        $response->assertOk();

    }

    public function testDeleteUser()
    {
        $this->login();
        $user = User::take(1)->first();

        $response = $this->delete('api/users/' . $user->id);
        $response->assertOk();
    }

}
