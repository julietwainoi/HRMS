<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class Role_user extends Controller
{
    //

public function assignrole($userId, $roleId){
// Retrieve the user and role instances
$user = User::find($userId); // Assuming $userId is the ID of the user
$role = Role::find($roleId); // Assuming $roleId is the ID of the role

// Attach the role to the user
if (!$user || !$role) {
    return response()->json(['error' => 'User or role not found.'], 404);
}

// Attach the role to the user
$user->roles()->attach($role->id);

return response()->json(['message' => 'Role assigned to user successfully.']);
}
}
