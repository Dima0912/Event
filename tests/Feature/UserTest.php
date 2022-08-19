<?php

namespace Tests\Feature;

use App\Http\Request\CreateUserRequest;
use App\Models\User;
use http\Env\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class UserTest extends TestCase
{

    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStore()
    {
        $this->post('api/login', [
            'email' => 'mirnydimas@gmail.com',
            'password' => 'secret',
        ]);
dd(User::all());
//     $user = User::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTY2MDk0MDI1NSwiZXhwIjoxNjYwOTQzODU1LCJuYmYiOjE2NjA5NDAyNTUsImp0aSI6IkVnb0lhUTJvYzhUa0NxZm8iLCJzdWIiOiIxOCIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.c6_Ej8mQDUdtEdBVAmVTBNBrN9l8tkeNdWYF81yP860',
        ])
            ->post('api/users', [
                'name' => 'dddasa',
                'surname' => 'sdesas',
                'phone' => '+380932334888',
                'email' => 'mirnydimas@gmail.com',
                'password' => 'secret',
            ]);

        $response->assertStatus(200);
    }
}
