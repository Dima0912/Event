<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserServiceUpdateControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $token = $this->post('api/login', [
            'email' => 'mirnydmisds@gmail.com',
            'password' => 'password',
        ]);

        $this->withHeaders([
            'Authorization' => 'Bearer' . $token['access_token'],
        ]);

        $user = User::take(1)->first();

        $response = $this->update('api/users/' . $user->id);

        $response->assertOk();
    }
}
