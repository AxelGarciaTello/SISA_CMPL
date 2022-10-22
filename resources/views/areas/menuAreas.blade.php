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
          <a href="{{route('avisos')}}" style="text-decoration:none">
              <font size="6"><span class="text-white">SISA | CMPL</span></font>
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
              <a class="nav-link" aria-current="page" href="{{route('avisos')}}">
                <span data-feather="arrow-left" class="align-text-bottom"></span>
                Volver a menu principal
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{request()->is('areas/21') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 21])}}">
                <span data-feather="globe" class="align-text-bottom"></span>
                Junta Directiva
              </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase 
          {{request()->is('areas/1') || request()->is('areas/2') || request()->is('areas/3') || request()->is('areas/4') || request()->is('areas/5') || request()->is('areas/6') ? '' : 'collapsed'}}" data-bs-toggle="collapse" data-bs-target="#sidebarMenu1" aria-controls="sidebarMenu1" aria-expanded="
          {{request()->is('areas/1') || request()->is('areas/2') || request()->is('areas/3') || request()->is('areas/4') || request()->is('areas/5') || request()->is('areas/6') ? 'true' : 'false'}}">
            <span >Áreas del CMPL</span>
            <a class="link-secondary" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>
        <nav class="collapse {{request()->is('areas/1') || request()->is('areas/2') || request()->is('areas/3') || request()->is('areas/4') || request()->is('areas/5') || request()->is('areas/6') ? 'show' : ''}}" id="sidebarMenu1">
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/1') ? 'active' : ''}}" aria-current="page" href="{{route('mostrarArea',['IdArea' => 1])}}">
                <span data-feather="home" class="align-text-bottom"></span>
                Dirección
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/2') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 2])}}">
                <span data-feather="hard-drive" class="align-text-bottom"></span>
                Subdirección Técnica de Vinculación <p>Área Técnica</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/3') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 3])}}">
                <span data-feather="align-left" class="align-text-bottom"></span>
                Subdirección Académica
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/4') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 4])}}">
                <span data-feather="git-merge" class="align-text-bottom"></span>
                Subdirección Técnica y de Vinculación <p>Área Vinculación</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/5') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 5])}}">
                <span data-feather="archive" class="align-text-bottom"></span>
                Departamento de Servicios Administrativos y Técnicos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/6') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 6])}}">
                <span data-feather="database" class="align-text-bottom"></span>
                Unidad de informatica
                </a>
            </li>
            </ul>
        </nav>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase 
          {{request()->is('areas/13') || request()->is('areas/12') || request()->is('areas/16') || request()->is('areas/17') || request()->is('areas/10') || request()->is('areas/20') ? '' : 'collapsed'}}" data-bs-toggle="collapse" data-bs-target="#sidebarMenu2" aria-controls="sidebarMenu2" aria-expanded="
          {{request()->is('areas/13') || request()->is('areas/12') || request()->is('areas/16') || request()->is('areas/17') || request()->is('areas/10') || request()->is('areas/20') ? 'true' : 'false'}}">
          <span>Gestión documental</span>
          <a class="link-secondary" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <nav class="collapse {{request()->is('areas/13') || request()->is('areas/12') || request()->is('areas/16') || request()->is('areas/17') || request()->is('areas/10') || request()->is('areas/20') ? 'show' : ''}}" id="sidebarMenu2">
            <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/13') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 13])}}">
                <span data-feather="paperclip" class="align-text-bottom"></span>
                Minutas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/12') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 12])}}">
                <span data-feather="book" class="align-text-bottom"></span>
                Instructivos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/16') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 16])}}">
                <span data-feather="align-justify" class="align-text-bottom"></span>
                Registros
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/17') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 17])}}">
                <span data-feather="columns" class="align-text-bottom"></span>
                Manual de organización
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/10') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 10])}}">
                <span data-feather="file-text" class="align-text-bottom"></span>
                Formatos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/20') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 20])}}">
                <span data-feather="info" class="align-text-bottom"></span>
                CIDEP
                </a>
            </li>
            </ul>
        </nav>
        <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{request()->is('areas/15') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 15])}}">
                <span data-feather="bookmark" class="align-text-bottom"></span>
                Definiciones
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{request()->is('areas/11') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 11])}}">
                <span data-feather="sun" class="align-text-bottom"></span>
                Sistema de Gestión Ambiental
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/18') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 18])}}">
                  <span data-feather="shield" class="align-text-bottom"></span>
                  Protección Civil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('areas/14') ? 'active' : ''}}" href="{{route('mostrarArea',['IdArea' => 14])}}">
                  <span data-feather="target" class="align-text-bottom"></span>
                  Mapa de Procesos
                </a>
            </li>
        </ul>
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