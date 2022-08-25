<?php

namespace App\Http\Controllers;

use App\Http\Request\CreateUserRequest;
use App\Http\Request\UpdateUserRequest;
use App\Models\User;
use App\Services\UpdateUsersService;

class UserController
{
    public function index()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $users, int $id)
    {
        $users = User::find($id);

        return $users;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, UpdateUsersService $updateUsersService, int $id)
    {
        return $updateUsersService->updateUsers($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, int $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        else {
            abort(404);
        }

    }
}
