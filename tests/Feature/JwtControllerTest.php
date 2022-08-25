<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JwtControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAuthorizeUser()
    {
        $response = $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'password',
        ]);

        $response->assertOk();
    }


    public function testFailedEmailUser()
    {
        $response = $this->post('api/login', [
            'email' => 'mirnydmids@gmail.com',
            'password' => 'password',
        ]);

        $response->assertUnauthorized();
    }

    public function testFailedPasswordUser()
    {
        $response = $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'pasword',
        ]);

        $response->assertUnauthorized();
    }
}
