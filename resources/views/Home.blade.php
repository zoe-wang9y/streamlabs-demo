@extends('welcome')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
 
    <div class="panel-default">
        <div class="panel-heading">
                Hi {{ $user_name }}, welcome to stream lab !
        </div>
        <div class="panel-body">


        <table class="table table-striped events-table"> 
        <!-- Table Headings -->
        <thead>
            <th>Check out your recent events!</th>
            <th>&nbsp;</th>
        </thead>

        <!-- Table Body -->
        @if (count($events) > 0) 
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <!-- Event Description -->
                    <td class="event-text">
                        <div>{{ $event->description }}</div>
                        @if ($event->message)
                        <div> Message: {{ $event->message }} </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        @endif
        </table>
        </div>
    </div>
 
@endsection