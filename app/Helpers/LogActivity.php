<?php


namespace App\Helpers;
use App\Log;
use Carbon\Carbon;
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

    /**
     * @return Log[]
     */
    public static function getDailyReport()
    {
        return Log::whereDate('created_at', Carbon::today())->get();
    }

    /**
     * @return Log[]
     */
    public static function getWeeklyReport()
    {
        return Log::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
    }

    /**
     * @return Log[]
     */
    public static function getMonthlyReport()
    {
        return Log::where('created_at', '>=', Carbon::now()->startOfMonth())->get();
    }
}