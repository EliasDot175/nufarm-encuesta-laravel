<!DOCTYPE html>
<html lang="es">
            <head>
    	           <meta charset="UTF-8">
    	           <title>Nufarm - Encuesta</title>
                        {{HTML::style('assets/css/bootstrap.min.css')}}
                        {{HTML::style('assets/css/estilos.css')}}
                        {{ HTML::style('assets/bootstrap-3.3.4/css/bootstrap.min.css') }}

                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

                      
             </head>

             <body>
                    <!-- contenedor -->
                    <div class="contenedor-encuesta">
                                <!-- head -->
                                <div class="head">
                                        <div class="contenido">
                                                {{ HTML::image('assets/imagenes/Nufarm-max-logo.png', "Imagen no encontrada", array('id' => 'Nufarm', 'title' => 'Nufarm')) }}
                                        </div>
                                </div>
                                <!-- //head -->
                        
                                @section('sidebar')
              
                                @show

                                @yield('content')

                                
                                        
                    </div>
                    <!-- contenedor -->
                    <!-- head -->
                    <div class="footer">
                                    {{ HTML::image('assets/imagenes/Nufarm-max-logo-verde.png', "Imagen no encontrada", array('id' => 'Nufarm', 'title' => 'Nufarm')) }}
                    </div>
                    <!-- //head -->
                    {{ HTML::script('assets/bootstrap-3.3.4/js/bootstrap.min.js') }}
                    {{ HTML::script('assets/js/eventos.js') }}

             </body>
</html>