<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;

/**
 * Class ReportController
 * @package App\Http\Controllers
 */
class ReportController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDailyReport()
    {
        try {
            return response()->json(array('data'=> LogActivity::getDailyReport()),201);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWeeklyReport()
    {
        try {
            return response()->json(array('data'=> LogActivity::getWeeklyReport()),201);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMonthlyReport()
    {
        try {
            return response()->json(array('data'=> LogActivity::getMonthlyReport()),201);
        } catch (Exception $e) {
            return response()->json("Internal server error", 500);
        }
    }
}