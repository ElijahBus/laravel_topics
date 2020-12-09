<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function createPermission()
    {
        $createPost = new Permission();
        $createPost->name = 'create-post';
        $createPost->display_name = "Create Post";
        $createPost->description = "Permission for creating a new post";
        return $createPost->save();
    }
}
