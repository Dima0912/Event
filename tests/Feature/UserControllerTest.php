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
        $token = $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'password',
        ]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer' . $token['access_token'],
        ])
            ->post('api/users', [
                'name' => 'йцуукук',
                'surname' => 'Mirny',
                'phone' => '+380978943827',
                'email' => 'mirnывавas@gmail.com',
                'password' => 'secret',
            ]);

        $response->assertStatus(200);
    }

    public function testShowUser()
    {
        $token = $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'password',
        ]);

        $this->withHeaders([
            'Authorization' => 'Bearer' . $token['access_token'],
        ]);
        $user = User::take(1)->first();

        $response = $this->get('api/users/' . $user->id);
        $response->assertOk();

    }

    public function testDeleteUser()
    {
        $token = $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'password',
        ]);

        $this->withHeaders([
            'Authorization' => 'Bearer' . $token['access_token'],
        ]);

        $user = User::take(1)->first();

        $response = $this->delete('api/users/' . $user->id);

        $response->assertOk();
    }

}
