<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $state = array_merge(['path' => '/users'] , $users->toArray());

        return view('user_info', ['state' => $state]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return User::create([
            "name" => 'Prodo',
            "email" => "prodo@domain.com",
            "password" => "elijahbus"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $state = array_merge(['path' => "/user/{$id}"], $user->toArray());

        return view('user_info', ['state' => $state]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addRole(User $user)
    {
        $owner = Role::where('name', 'owner')->first();
        $user->attachRole($owner);

        return "role attached";
    }

    public function removeRole(User $user)
    {
        $owner = Role::where('name', 'owner')->first();
        $user->detachRole($owner);

        return "role detached";
    }


}
