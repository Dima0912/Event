<?php

namespace App\Services\Contracts;

use App\Http\Request\UpdateUserRequest;

interface UpdateUsersInterface
{
    public function update_users(UpdateUserRequest $request, $id);
}
