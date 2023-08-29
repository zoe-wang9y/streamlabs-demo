<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class EventsController extends Controller
{
    public function getEvents(Request $request) {
        if(!$request->user_id){
            return response()->json('Request is invalid', 400);
        }
        if($request->format === 'pretty') {
            $formattedEvents = $this->getFormattedEvents($request->user_id, $request->page);
            return response()->json($formattedEvents);
        } else {
            $events = $this->queryEvents($request->user_id, $request->page);
            return response()->json($events);
        }
    }

    public function markEvent(Request $request) {
        // need to modify table to add extra column to keep track of read/unread attributes
        // implement later
        return response()->json('not implemented');
    }

    public function getFormattedEvents($user_id, $page) {
        $events = $this->queryEvents($user_id, $page);
        $formattedEvents = [];
        foreach ($events as $event) {
            $formattedEvent = $this->formatEvent($event);
            $formattedEvents[] = $formattedEvent;
        }
        return $formattedEvents;
    }

    private function queryEvents($user_id, $page=0, $limit=100) {
        // logic:
        // query separately from followers, subscribers, donations, merch_sales
        // union them together and order by timestamp

        $followers = DB::table('followers')
            -> select('user_id', 
                        'follower_id as event_id',
                        DB::raw("'follow' as eventType"), 
                        'name as invoker', 
                        'followed_at as timestamp', 
                        DB::raw('null as "tier"'),
                        DB::raw('null as "currency"'),
                        DB::raw('null as "amount"'),
                        DB::raw('null as "message"'),
                        DB::raw('null as "item_name"'),
                        DB::raw('null as "quantity"'),
                        DB::raw('null as "price"'),
                    )
            -> where('user_id', $user_id);

        $subscribers = DB::table('subscribers')
            -> select('user_id', 
                    'subscriber_id as event_id',
                    DB::raw("'subscribe' as eventType"), 
                    'name as invoker', 
                    'subscribed_at as timestamp', 
                    'tier as tier',
                    DB::raw('null as "currency"'),
                    DB::raw('null as "amount"'),
                    DB::raw('null as "message"'),
                    DB::raw('null as "item_name"'),
                    DB::raw('null as "quantity"'),
                    DB::raw('null as "price"'),
                )
            -> where('user_id', $user_id);

        $donations = DB::table('donations')
            -> select('user_id', 
                    'donation_id as event_id', 
                    DB::raw("'donation' as eventType"), 
                    'name as invoker', 
                    'timestamp as timestamp', 
                    DB::raw('null as "tier"'),
                    'currency as currency',
                    'amount as amount',
                    'message as message',
                    DB::raw('null as "item_name"'),
                    DB::raw('null as "quantity"'),
                    DB::raw('null as "price"'),
                )
            -> where('user_id', $user_id);
        
        $merch_sales = DB::table('merch_sales')
            -> select('merch_id as user_id', 
                    'sales_id as event_id',
                    DB::raw("'merch_sale' as eventType"), 
                    'name as invoker', 
                    'timestamp as timestamp', 
                    DB::raw('null as "tier"'),
                    DB::raw('null as "currency"'),
                    DB::raw('null as "amount"'),
                    DB::raw('null as "message"'),
                    'item_name as item_name',
                    'quantity as quantity',
                    'price as price'
                )
            -> where('merch_id', $user_id);
        
        $offset = $page * 100;
        
        $events = $followers->union($subscribers)->union($donations)->union($merch_sales)
            ->orderBy('timestamp', 'desc')
            ->limit($limit)
            ->offset($offset)
            ->get();
        
        return $events;
    }

    private function formatEvent($event) {
        // format event output
        $formattedEvent = new stdClass();
        $formattedEvent->user_id = $event->user_id;
        $formattedEvent->event_id = $event->event_id;
        $formattedEvent->invoker = $event->invoker;
        $formattedEvent->eventType = $event->eventType;
        $formattedEvent->timestamp = $event->timestamp;
        $formattedEvent->message = '';
        $description = '';
        
        // generate description text based on event type
        switch($event->eventType) {
            case 'follow':
                $description = $event->invoker.' followed you!'; 
                break;
            case 'subscribe':
                $description = $event->invoker.'(Tier'.$event->tier.') subscribed to you!'; 
                break;
            case 'donation':
                $description = $event->invoker.' donated '.$event->amount.' '.$event->currency.' to you!';
                $formattedEvent->message = $event->message;
                break;
            case 'merch_sale':
                $description = $event->invoker.' bought '.$event->quantity.' '.$event->item_name.' from you for '.$event->price.'!';
                break;
        }
        $formattedEvent->description = $description;
        return $formattedEvent;
    }
}
