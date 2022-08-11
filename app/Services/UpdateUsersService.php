<?php

namespace App\Services;

use App\Http\Request\UpdateUserRequest;
use App\Models\User;
use App\Services\Contracts\UpdateUsersInterface;

class UpdateUsersService implements UpdateUsersInterface
{

    public function update_users(UpdateUserRequest $request, $id)
    {

        $user = User::find($id);
        if (empty($user)){
            abort(404);
        }
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();

    }
}
