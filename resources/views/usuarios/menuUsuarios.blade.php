<!doctype html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMPL</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/Imagenes/logo-ico.png">
    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .scrollbar {
        background: #fff;
        overflow-y: scroll;
        height: 100%;
        margin-bottom: 25px;
      }

    </style>
    
    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    
    <header class="navbar sticky-top flex-md-nowrap p-0 shadow" style="background-color: #65CF58;">
        <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span data-feather="more-vertical" style="width:24px;height:24px;color:white;"></span>
        </button>
        <div></div>
        <div>
          <a href="{{route('mostrarUsuarios')}}"  style="text-decoration:none">
              <font size="6"><span class="text-white">Sistema de Administración</span></font>
          </a>
        </div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{asset('Imagenes/user_icon-icons.com_66546.png')}}" alt="mdo" width="32" height="32" class="rounded-circle"><span class="text-white">{{auth()->user()->Nombre}}</span>
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="{{route('mostrarContrasenia')}}">Cambiar contraseña</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/salir">Cerrar sesión</a></li>
            </ul>
        </div>
        <div></div>
    </header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 scrollbar">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>MENÚ</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{request()->is('usuarios') ? 'active' : ''}}" aria-current="page" href="{{route('mostrarUsuarios')}}">
                <span data-feather="user" class="align-text-bottom"></span>
                Usuarios
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.sidirtel.ipn.mx/" TARGET=”_blank”>
                <span data-feather="book" class="align-text-bottom"></span>
                Directorio IPN
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://148.204.90.213/Directorio/Directorio.html" TARGET=”_blank”>
                <span data-feather="book" class="align-text-bottom"></span>
                Directorio CMP+L
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('avisos')}}">
                <span data-feather="globe" class="align-text-bottom"></span>
                SIG
              </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase
          {{request()->is('oficios/salientes') || request()->is('oficios/entrantes') ? '' : 'collapsed'}}" data-bs-toggle="collapse" data-bs-target="#oficios" aria-controls="oficios" aria-expanded="
          {{request()->is('oficios/salientes') || request()->is('oficios/entrantes') ? 'true' : 'false'}}">
            <span>Oficios</span>
            <a class="link-secondary">
              <span data-feather="plus-circle" class="align-text-botton"></span>
            </a>
        </h6>
        <nav class="collapse {{request()->is('oficios/salientes') || request()->is('oficios/entrantes') ? 'show' : ''}}" id="oficios">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{request()->is('oficios/entrantes') ? 'active' : ''}}" href="{{route('oficiosEntrantes')}}">
                <span data-feather="file" class="align-text-botton"></span>
                Oficios entrantes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{request()->is('oficios/salientes') ? 'active' : ''}}" href="{{route('oficiosSalientes')}}">
                <span data-feather="file" class="align-text-botton"></span>
                Oficios salientes
              </a>
            </li>
          </ul>
        </nav>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase
          {{request()->is('memos/salientes') || request()->is('memos/entrantes') ? '' : 'collapsed'}}" data-bs-toggle="collapse" data-bs-target="#memos" aria-controls="memos" aria-expanded="
          {{request()->is('memos/salientes') || request()->is('memos/entrantes') ? 'true' : 'false'}}">
            <span>Memorandums</span>
            <a class="link-secondary">
              <span data-feather="plus-circle" class="align-text-botton"></span>
            </a>
        </h6>
        <nav class="collapse {{request()->is('memos/salientes') || request()->is('memos/entrantes') ? 'show' : ''}}" id="memos">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{request()->is('memos/entrantes') ? 'active' : ''}}" href="{{route('memosEntrantes')}}">
                <span data-feather="file" class="align-text-botton"></span>
                Memorandums entrantes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{request()->is('memos/salientes') ? 'active' : ''}}" href="{{route('memosSalientes')}}">
                <span data-feather="file" class="align-text-botton"></span>
                Memorandums salientes
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @if(Session::has('msg'))
          <div class="alert alert-success">
            {{Session::get('msg')}}
          </div>
        @endif
        @yield('content')
    </main>
  </div>
</div>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="{{asset('js/dashboard.js')}}"></script>
  </body>
</html>