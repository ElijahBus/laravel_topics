<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

class UserController
{
    public function index()
    {
        $users = User::all();
        $state = array_merge(['path' => "/users"], $users->toArray());

        return response()->json($state);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $state = array_merge(['path' => "/user/{$id}"], $user->toArray());

        return response()->json($state);
    }
}
