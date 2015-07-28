<!DOCTYPE html>
<html lang="es">
            <head>
    	           <meta charset="UTF-8">
    	           <title>Nufarm - Encuesta</title>
                        {{HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css')}}
                        {{HTML::style('assets/css/bootstrap.min.css')}}
                        {{HTML::style('assets/css/jumbotron-narrow.css')}}
                        {{HTML::style('assets/css/estilos.css')}}
             </head>

             <body>
                         <!-- contenedor -->
                        <div class="container">
                        
                                        @section('sidebar')
              
                                        @show

                                        @yield('content')
                                        
                          </div>
                          <!-- contenedor -->

             </body>
</html>