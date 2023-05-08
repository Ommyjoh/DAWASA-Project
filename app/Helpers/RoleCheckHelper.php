<?php

namespace App\Helpers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoleCheckHelper
{
    public static function isAdmin()
    {
        $admin = Staff::where([
            'role' => 'Admin',
            'id' => auth('staff')->id(),
        ])->first();
        if (isset($admin) && $admin->role == 'Admin') {
            return true;
        } else {
            return false;
        }
    }
}
