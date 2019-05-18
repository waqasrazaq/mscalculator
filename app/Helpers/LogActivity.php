<?php


namespace App\Helpers;
use App\Log;
use Request;

/**
 * Class LogActivity
 * @package App\Helpers
 */
class LogActivity
{
    /**
     * @param $activity
     */
    public static function addToLog($activity)
    {
        $log = [];
        $log['activity'] = $activity;
        $log['ip'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        Log::create($log);
    }
}