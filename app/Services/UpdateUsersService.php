<?php

namespace App\Services;

use App\Http\Request\UpdateUserRequest;
use App\Models\User;
use App\Services\Contracts\UpdateUsersInterface;

class UpdateUsersService implements UpdateUsersInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function updateUsers(UpdateUserRequest $request, $id): void
    {
        $user = $this->user->find($id);
        if (isset($user)) {
            $user->update($request->validated());
        } else {
            abort(404);
        }


    }
}
