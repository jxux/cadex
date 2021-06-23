<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Cadex Pacifico </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700" />
    <link rel="stylesheet" href="{{ asset('web/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/estilos.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/menu.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/slider_seccion.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/card.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}" />
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"> </script>
</head>
<header class="entero menu-contenedor">
    <div class="medio">
        <a class="logo" href="/"><img class="logo_img" src="{{ asset('web/imagenes/logo.png') }}" /></a><i
            class="icon-menu" id="btn-menu"></i>
        <ul class="menu nav" id="menu">
            <a data-title="Inicio" href="/">
                <li>Inicio</li>
            </a><a data-title="Calamar" href="{{ url('/calamar') }}">
                <li>Calamar</li>
            </a><a data-title="Peces" href="{{ url('/peces') }}">
                <li>Peces</li>
            </a><a data-title="Contactanos" href="{{ url('/contactanos') }}">
                <li>Contactanos</li>
            </a>
            @if (Route::has('login'))
                @auth
                <a data-title="Dashboard" href="{{ route('dashboard') }}">
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
    <div class="slider_seccion wow fadeIn"><img src="{{ asset('web/imagenes/seccion/pescado.jpg') }}" /></div>
    <div class="tittle entero wow fadeIn">
        <div class="medio">
            <h1>Pescados</h1>
        </div>
    </div>
    <div class="productos entero">
        <div class="medio">
            <div class="card_group"><a class="card wow fadeInUp" data-wow-delay=".2s" href="/pescados/perico">
                    <div class="card_image"><img src="{{ asset('web/imagenes/pescados/1.jpg') }}" /></div>
                    <div class="card_info">
                        <h2>Pez Perico</h2>
                        <p>Seccion: Pescados</p>
                    </div>
                </a><a class="card wow fadeInUp" data-wow-delay=".4s" href="/pescados/merluza">
                    <div class="card_image"><img src="{{ asset('web/imagenes/pescados/2.jpg') }}" /></div>
                    <div class="card_info">
                        <h2>Pez Merluza</h2>
                        <p>Seccion: Pescados</p>
                    </div>
                </a><a class="card wow fadeInUp" data-wow-delay=".6s" href="/pescados/pez-volador">
                    <div class="card_image"><img src="{{ asset('web/imagenes/pescados/3.jpg') }}" /></div>
                    <div class="card_info">
                        <h2>Pez Volador</h2>
                        <p>Seccion: Pescados</p>
                    </div>
                </a></div>
        </div>
    </div>
    <script src="{{ asset('web/js/efectos.js') }}"></script>
    <script src="{{ asset('web/js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <footer class="entero wow fadeInUp">
        <div class="medio">
            <div class="primer"><a class="logo_footer" href="/"><img src="{{ asset('web/imagenes/logo.png') }}" /></a>
            </div>
            <div class="segundo">
                <p class="titulo_footer">Enlace</p><a href="/">Inicio </a><a
                    href="{{ url('/calamar') }}">Calamares</a><a href="{{ url('/peces') }}">Pescados</a>
            </div>
            <div class="tercer">
                <p class="titulo_footer">Contacto</p><a
                    href="mailto:ventas@cadexpacifico.com">ventas@cadexpacifico.com</a><a href="tel:951965242">951 965
                    242 - 01 480 0125 anexo 106 </a><a href="/">www.cadexpacifico.com</a>
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
</body>

</html>