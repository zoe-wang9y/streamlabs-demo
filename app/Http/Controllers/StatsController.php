<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use stdClass;

class StatsController extends Controller
{
    public function getFollowerStats(Request $request) {
        if(!$request->user_id) {
            return response()->json('Invalid request', 400);
        }
        // by default, query follower stats for past 30 days
        $days = $request->days ? $request->days : 30;
        // query total amount of follower gained in a time frame
        $followerCount = DB::table('followers')
            ->where('user_id', $request->user_id)
            ->where('followed_at', '>=', Carbon::now()->subDays($days)->toDateTimeString())
            ->count();
        $response = new stdClass();
        $response->followerCount = $followerCount;
        $response->days = $days;
        $response->user_id = $request->user_id;
        return response()->json($response);
    }

    public function getSaleItemStats(Request $request) {
        return response()->json('not implemented');
    }

    public function getRevenueStats(Request $request) {
        return response()->json('not implemented');
    }
}
