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
        if (isset($admin)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isCustCare()
    {
        $admin = Staff::whereIn('role', ['Admin', 'Customer Care'])
                ->where('id', auth('staff')->id())
                ->first();

        if (isset($admin)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isSurveyor()
    {
        $admin = Staff::whereIn('role', ['Admin', 'Surveyor'])
                ->where('id', auth('staff')->id())
                ->first();
                
        if (isset($admin)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isEngineer()
    {
        $admin = Staff::whereIn('role', ['Admin', 'Engineer'])
                ->where('id', auth('staff')->id())
                ->first();
                
        if (isset($admin)) {
            return true;
        } else {
            return false;
        }
    }
}
