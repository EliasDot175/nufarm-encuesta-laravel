<!doctype html>
<html lang="en">
            <head>
                        <meta charset="UTF-8">
            	           <title>Nufarm - Encuesta</title>
            	           <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
            	           {{ HTML::style('assets/css/signin.css') }}
            </head>
            <body>
                            <!-- contenedor -->
                            <div class="container">

                                        @section('sidebar')

                                                <h3>Encuesta Nufarm</h3>
                                                <a href="{{ action('AuthController@logOut') }}">Log out</a>
                                                
                                        @show

                                        @yield('content')

                            </div>
                            <!-- //contenedor -->

            </body>
</html>