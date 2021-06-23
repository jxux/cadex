
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
      <title>Cadex Pacifico </title>
      
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700"/>
      <link rel="stylesheet" href="{{ asset('web/css/styles.css') }}"/>
      <link rel="stylesheet" href="{{ asset('web/css/estilos.css') }}"/>
      <link rel="stylesheet" href="{{ asset('web/css/menu.css') }}"/>
      <link rel="stylesheet" href="{{ asset('web/css/internos.css') }}"/>
      <link rel="stylesheet" href="{{ asset('web/css/footer.css') }}"/>
      <link rel="stylesheet" href="{{ asset('web/css/animate.css') }}"/>
      <link rel="stylesheet" href="{{ asset('web/css/contacto.css') }}"/>
      <script src="https://code.jquery.com/jquery-1.11.3.min.js"> </script>
    </head>
    <header class="entero menu-contenedor">
      <div class="medio"><a class="logo" href="/"><img class="logo_img" src="{{ asset('web/imagenes/logo.png') }}"/></a><i class="icon-menu" id="btn-menu"></i>
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
      <div class="slider_seccion wow fadeIn"><img src="{{ asset('web/imagenes/contacto.jpg') }}"/></div>
      <div class="formulario entero">
        <div class="medio">
          <h1>Contactanos</h1>
          <form>
            <input type="text" placeholder="Nombre"/>
            <input type="text" placeholder="Telefono"/>
            <input type="text" placeholder="Asunto"/>
            <textarea placeholder="Mensaje"></textarea>
            <button>Enviar</button>
          </form>
        </div>
      </div>
      <script src="{{ asset('web/js/efectos.js') }}"></script>
      <footer class="entero wow fadeInUp">
        <div class="medio">
          <div class="primer"><a class="logo_footer" href="/"><img src="{{ asset('web/imagenes/logo.png') }}"/></a></div>
          <div class="segundo">
            <p class="titulo_footer">Enlace</p><a href="/">Inicio </a><a href="{{ url('/calamar') }}">Calamares</a><a href="{{ url('/peces') }}">Pescados </a>
          </div>
          <div class="tercer">
            <p class="titulo_footer">Contacto</p><a href="mailto:ventas@cadexpacifico.com">ventas@cadexpacifico.com</a><a href="tel:951965242">951 965 242 - 01 480 0125 anexo 106 </a><a href="/">www.cadexpacifico.com</a>
          </div>
        </div>
      </footer>
      <div class="ultimo entero">
        <div class="medio">
          <h2>Cadex Pacifico 2021</h2><span>
            <p>Diseñado por </p><a href="http://www.stigold.com/">Sti Gold</a></span>
        </div>
      </div>
    </body>
  </html>