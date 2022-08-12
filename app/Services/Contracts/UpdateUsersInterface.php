<?php

namespace App\Services\Contracts;

use App\Http\Request\UpdateUserRequest;

interface UpdateUsersInterface
{
    public function updateUsers(UpdateUserRequest $request, $id);
}
