<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function getEvents(Request $request) {
        // stab method
        // for retrieving a list of events
        // events are one of subscribe, follow,donation, merch_sales activities that happen to a particular user
        // ordered by time of execution.
        return response()->json('not implemented');
    }

    public function markEvent(Request $request) {
        return response()->json('not implemented');
    }
}
