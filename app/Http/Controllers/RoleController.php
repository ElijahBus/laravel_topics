<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Laratrust\Traits\LaratrustRoleTrait;

class RoleController extends Controller
{
    use LaratrustRoleTrait;

    public function createRole()
    {
        $owner = new Role();
        $owner->name = "owner";
        $owner->display_name = "Owner";
        $owner->description = "Owner of a certain shop";
        return $owner->save();
    }

    public function addPermission($id)
    {
        $owner = Role::where('name', 'owner')->first();
        $createPost = Permission::findOrFail($id)->id;

        $owner->attachPermission($createPost);

        return "permission attached";
    }

    public function removePermission($id)
    {
        $owner = Role::where('name', 'owner')->first();
        $createPost = Permission::findOrFail($id)->id;

        $owner->detachPermission($createPost);

    }

}
