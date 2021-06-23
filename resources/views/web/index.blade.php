<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadex Pacifico</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700" />
        <link rel="stylesheet" href="{{ asset('web/css/styles.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('web/css/estilos.css') }}" />
        <link rel="stylesheet" href="{{ asset('web/css/menu.css') }}" />
        <link rel="stylesheet" href="{{ asset('web/css/slider.css') }}" />
        <link rel="stylesheet" href="{{ asset('web/css/body.css') }}" />
        <link rel="stylesheet" href="{{ asset('web/css/card.css') }}" />
        <link rel="stylesheet" href="{{ asset('web/css/footer.css') }}" />
        <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}" />
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"> </script>

        <!--metas de fb-->
        <meta property="og:url" content="http://cadexpacifico.com" />
        <meta property="og:image:url" content="https://static.pexels.com/photos/196659/pexels-photo-196659.jpeg" />
        <meta property="og:title" content="Exportadora de productos hidrobiológicos - Cadex Pacifico" />
        <meta property="og:type" content="Website" />
        <meta property="og:site_name" content="Cadex Pacifico" />
        <meta property="og:description" content="Cadex Pacifico es una empresa exportadora de productos hidrobiológicos de alta calidad, con un proceso de calidad eficiente para garantizar el producto que lleva a su mesa" />

        <!--metas-->
        <meta name="author" content="stigold.com">
        <meta name="owner" content="STI Gold">
        <meta name="keywords" content="mejillones de calamar de la mejor calidad, calamar gigante extraido del pacifico, exportacion de calidad, comercio exterior de calidad para el mundo, pota procesada, pez volador precesado, ">
        <meta name="description" content="Cadex Pacifico es una empresa exportadora de productos hidrobiológicos de alta calidad, con un proceso de calidad eficiente para garantizar el producto que lleva a su mesa">

    </head>
    <header class="entero menu-contenedor">
        <div class="medio"><a class="logo" href="/"><img class="logo_img" src="{{ asset('web/imagenes/logo.png') }}" /></a><i class="icon-menu" id="btn-menu"></i>
            <ul class="menu nav" id="menu">
                <a data-title="Inicio" href="/">
                    <li>Inicio</li>
                </a>
                <a data-title="Calamar" href="{{ url('/calamar') }}">
                    <li>Calamar</li>
                </a>
                <a data-title="Peces" href="{{ url('/peces') }}">
                    <li>Peces</li>
                </a>
                <a data-title="Contactanos" href="{{ url('/contactanos') }}">
                    <li>Contactanos</li>
                </a>
                @if (Route::has('login'))
                    @auth
                        <a data-title="Dashboard" href="{{ url('/dashboard') }}">
                            <li>Dashboard</li>
                        </a>
                    @else
                        <a data-title="Intranet" href="{{ route('login') }}">
                            <li>Intranet</li>
                        </a>
                    @endauth
                @endif
            </ul>
        </div>
    </header>
    <body>
        <div class="slider wow fadeIn">
            <div class="slider_content">
                <div class="slider_items"><img src="{{ asset('web/imagenes/slider/slider_1.jpeg') }}" />
                    <h1 class="texto_slider">Cadena de Exportación de Calidad</h1>
                </div>
                <div class="slider_items"><img src="{{ asset('web/imagenes/slider/slider_2.jpg') }}" />
                    <p class="texto_slider">Exportación de calamar y pescados</p>
                </div>
                <div class="slider_items"><img src="{{ asset('web/imagenes/slider/slider_3.jpg') }}" />
                    <p class="texto_slider">Procesos de calidad </p>
                </div>
                <div class="slider_items"><img src="{{ asset('web/imagenes/slider/slider_4.jpg') }}" />
                    <p class="texto_slider">Cálidad en nuestros, garantía en nuestros servicios</p>
                </div>
            </div><i class="icon-izquierda btn_slider"></i><i class="icon-derecha btn_slider"></i>
        </div>
        <div class="proceso entero">
            <div class="medio">
                <p class="titulo wow fadeIn">Nuestro Proceso</p>
                <div class="proceso_items pescas wow bounceInUp" data-wow-delay=".2s"> <span>1</span>
                    <div class="proceso_items_info">
                        <h3>Pesca</h3>
                        <p>Comenzamos con la pesca de los productos dependiendo al pedido que tenemos, le enmendamos este
                            trabajo a personas con experiencia en la pesca, asi puedan sacar pescados o calamar de calidad.
                        </p>
                    </div>
                </div>
                <div class="proceso_items transporte wow bounceInUp" data-wow-delay=".4s"> <span>2</span>
                    <div class="proceso_items_info">
                        <h3>Transporte</h3>
                        <p>Luego de haber concluido con el paso 1, pescando nuestros calamares y pescados, transportamos
                            nuestros productos recién sacados del mar, a nuestro almacén.</p>
                    </div>
                </div>
                <div class="proceso_items proceso wow bounceInUp" data-wow-delay=".6s"> <span>3</span>
                    <div class="proceso_items_info">
                        <h3>Proceso</h3>
                        <p>Al recibir nuestros productos al almacén, nuestros expertos empiezan a verificar y descartar que
                            productos están aptos para el consumo, de lo contrario, se desecha.</p>
                    </div>
                </div>
                <div class="proceso_items exportacion wow bounceInUp" data-wow-delay=".8s"> <span>4</span>
                    <div class="proceso_items_info">
                        <h3>Exportacion</h3>
                        <p>Al finalizar el proceso de selección, se empezará a cortarse y a trabajar el producto dependiendo
                            del pedido hecho. Terminando esto se empieza con la exportación de cada producto, así mandándolo
                            a su destino. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="productos entero">
            <div class="medio">
                <p class="titulo wow fadeIn">Nuestros Productos</p>
                <div class="card_group">
                    <a class="card wow bounceInUp" data-wow-delay=".2s" href="/calamar/tentaculos-de-pota">
                        <div class="card_image">
                            <img src="{{ asset('web/imagenes/calamar/1.jpg') }}" />
                        </div>
                        <div class="card_info">
                            <h2>Tentaculos de pota</h2>
                            <p>Seccion: Calamar</p>
                        </div>
                    </a>
                    <a class="card wow bounceInUp" data-wow-delay=".4s" href="/calamar/aleta-de-pota">
                        <div class="card_image"><img src="{{ asset('web/imagenes/calamar/2.jpg') }}" /></div>
                        <div class="card_info">
                            <h2>Aleta de pota</h2>
                            <p>Seccion: Calamar</p>
                        </div>
                    </a>
                    <a class="card wow bounceInUp" data-wow-delay=".6s" href="/calamar/rodajas-de-pota">
                        <div class="card_image"><img src="{{ asset('web/imagenes/calamar/3.jpg') }}" /></div>
                        <div class="card_info">
                            <h2>Rodajas de pota</h2>
                            <p>Seccion: Calamar</p>
                        </div>
                    </a>
                    <a class="card wow bounceInUp" data-wow-delay=".8s" href="/calamar/anillas-de-pota">
                        <div class="card_image"><img src="{{ asset('web/imagenes/calamar/4.jpg') }}" /></div>
                        <div class="card_info">
                            <h2>Anillas de pota</h2>
                            <p>Seccion: Calamar</p>
                        </div>
                    </a>
                </div>
                <a class="calamares_button" href="{{ url('/calamar') }}">Ver Calamares</a>
            </div>
        </div>
        <div class="productos entero">
            <div class="medio">
                <div class="card_group">
                    <a class="card wow bounceInUp" data-wow-delay=".2s" href="/pescados/perico">
                        <div class="card_image">
                            <img src="{{ asset('web/imagenes/pescados/1.jpg') }}" />
                        </div>
                        <div class="card_info">
                            <h2>Pez Perico</h2>
                            <p>Seccion: Pescados</p>
                        </div>
                    </a>
                    <a class="card wow bounceInUp" data-wow-delay=".4s" href="/pescados/merluza">
                        <div class="card_image">
                            <img src="{{ asset('web/imagenes/pescados/2.jpg') }}" />
                        </div>
                        <div class="card_info">
                            <h2>Pez Merluza</h2>
                            <p>Seccion: Pescados</p>
                        </div>
                    </a>
                    <a class="card wow bounceInUp" data-wow-delay=".6s" href="/pescados/pez-volador">
                        <div class="card_image">
                            <img src="{{ asset('web/imagenes/pescados/3.jpg') }}" />
                        </div>
                        <div class="card_info">
                            <h2>Pez Volador</h2>
                            <p>Seccion: Pescados</p>
                        </div>
                    </a>
                </div>
                <a class="calamares_button" href="{{ url('/peces') }}">Ver Peces</a>
            </div>
        </div>
        <script src="{{ asset('web/js/efectos.js') }}"></script>
        <script src="{{ asset('web/js/wow.min.js') }}"></script>
        <script>new WOW().init();</script>
        <footer class="entero wow fadeInUp">
            <div class="medio">
                <div class="primer">
                    <a class="logo_footer" href="/">
                        <img src="{{ asset('web/imagenes/logo.png') }}" />
                    </a>
                </div>
                <div class="segundo">
                    <p class="titulo_footer">Enlace</p><a href="/">Inicio </a>
                    <a href="/calamares.html">Calamares</a>
                    <a href="/peces">Pescados </a>
                </div>
                <div class="tercer">
                    <p class="titulo_footer">Contacto</p>
                    <a href="mailto:ventas@cadexpacifico.com">ventas@cadexpacifico.com</a>
                    <a href="tel:951965242">951 965 242 - 01 480 0125 anexo 106 </a>
                    <a href="/">www.cadexpacifico.com</a>
                </div>
            </div>
        </footer>
        <div class="ultimo entero">
            <div class="medio">
                <h2>Cadex Pacifico 2021</h2><span>
                    <p>Diseñado por </p><a href="http://www.stigold.com/">Sti Gold</a>
                </span>
            </div>
        </div>
        <!-- Código de instalación Cliengo para http://cadexpacifico.com -->
        <script type="text/javascript">
            (function () {
                var ldk = document.createElement('script');
                ldk.type = 'text/javascript';
                ldk.async = true;
                ldk.src = 'https://s.cliengo.com/weboptimizer/5bf9769be4b00e670fb93848/5bf9769ce4b00e670fb9384b.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ldk, s);
            })();
        </script>
    </body>    
</html>
