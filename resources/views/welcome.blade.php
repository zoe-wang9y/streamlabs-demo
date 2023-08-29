<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <title>StreamLab - Demo</title>
 
        <!-- CSS And JavaScript -->
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
            </nav>
        </div>
 
        @yield('content')
    </body>
</html>
