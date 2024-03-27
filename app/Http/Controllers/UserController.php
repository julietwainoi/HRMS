<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
class UserController extends Controller
{
    public function assignRole($userId, $roleId)
    {
        // Retrieve the user and role instances based on the provided IDs
        $user = User::where('IDNo', $userId)->first();
        $role = Role::find($roleId);

        // Check if both user and role exist
        if (!$user || !$role) {
            return response()->json(['error' => 'User or role not found.'], 404);
        }

        // Attach the role to the user
        $user->roles()->attach($role->id);

        return response()->json(['message' => 'Role assigned to user successfully.']);
    }
}
