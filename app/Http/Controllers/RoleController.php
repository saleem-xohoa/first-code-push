<?php
namespace App\Http\Controllers;

use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::find(2);
        return $role->users;
    }
}