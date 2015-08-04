<!doctype html>
<html lang="en">
            <head>
                        <meta charset="UTF-8">
            	           <title>Nufarm - Encuesta</title>
                                {{ HTML::style('assets/bootstrap-3.3.4/css/bootstrap.min.css') }}
                                {{ HTML::style('assets/css/admin.css') }}
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                                <script src="assets/bootstrap-3.3.4/js/bootstrap.min.js"></script>
            </head>
            <body>
                            <!-- contenedor -->
                            <div class="container">

                                        <nav class="navbar navbar-default" role="navigation">
                                                  <div class="navbar-header">
                                                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                            data-target=".navbar-ex1-collapse">
                                                            <span class="sr-only">Desplegar navegación</span>
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                        </button>
                                                    <a class="navbar-brand" href="#">NUFARM</a>
                                                </div>

                                                <div class="collapse navbar-collapse navbar-ex1-collapse ">
                                                    <ul class="nav navbar-nav navbar-right">
                                                             <li><a href="{{ URL::route('metricas-encuesta') }}" id="metricas">Métricas y porcentajes </a></li>
                                                             <li ><a href="{{ URL::route('lista-encuesta') }}" id="lista-encuestas">Listado de encuestas</a></li>
                                                             <li class="active"><a href="{{ action('AuthController@logOut') }}">Logout</a></li>
                                                    </ul>
                                                </div>
                                        </nav>

                                        @section('sidebar')

                                                
                                        @show

                                        @yield('content')

                            </div>
                            <!-- //contenedor -->



            </body>
</html>