<html>
    <body>
        @section('sidebar')
            <h1>Encuesta Nufarm</h1>
            <a href="{{ action('AuthController@logOut') }}">Log out</a>
        @show

        <div class="container">
        
            @yield('content')
        </div>

    </body>
</html>