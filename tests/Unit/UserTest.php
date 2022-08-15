<?php

namespace Tests\Unit;

use App\Http\Request\CreateUserRequest;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testStore()
    {
        $user = new User();
        $this->assertEquals(200, '', 'Пользователь создан');
    }
}
