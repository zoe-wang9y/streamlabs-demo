<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class StatsController extends Controller
{
    public function getFollowerStats(Request $request) {
        // query total amount of follower gained in a time frame
        return response()->json('not implemented');
    }

    public function getSaleItemStats(Request $request) {
        return response()->json('not implemented');
    }

    public function getRevenueStats(Request $request) {
        return response()->json('not implemented');
    }
}
