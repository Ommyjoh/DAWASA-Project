<?php

namespace App\Helpers;

use Carbon\Carbon;

class SettingsHelper
{

    public static function getGreeting()
    {
        //$time = date("H");
        $time = Carbon::now()->hour;
        /* If the time is less than 1200 hours, show good morning */
        if ($time < '12') {
            return 'Good morning';
        }
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */ elseif ($time >= '12' && $time < '17') {
            return 'Good afternoon';
        }
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */ elseif ($time >= '17' && $time < '22') {
            return 'Good evening';
        }
        /* Finally, show good night if the time is greater than or equal to 2200 hours */ elseif ($time >= '22') {
            return 'Good night';
        }
    }
}
