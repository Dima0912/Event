<?php

namespace App\Services;

use App\Http\Request\UpdateUserRequest;
use App\Models\User;
use App\Services\Contracts\UpdateUsersInterface;

class UpdateUsersService implements UpdateUsersInterface
{

    public function updateUsers(UpdateUserRequest $request, $id)
    {

        $user = User::find($id);
        if (empty($user)){
            abort(404);
        }
        $user->update($request->validated());

    }
}
