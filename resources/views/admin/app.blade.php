<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DISTRIBUIDORA ANGEL </title>
    <!-- theme meta -->
    <meta name="theme-name" content="mono" />
    <!-- GOOGLE FONTS -->
    
    <link href="{{asset('https://fonts.googleapis.com/css?family=Karla:400,700|Roboto')}}" rel="stylesheet">
    <link href="{{asset('plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/simplebar/simplebar.css')}}" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('icon/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('icon/font-awesome/css/font-awesome.min.css')}}">
    <link href="{{asset('plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/select2/select2-bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('https://cdn.quilljs.com/1.3.6/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- FAVICON -->
    <link href="{{asset('images/logo_angel_celeste.png')}}" rel="shortcut icon" />
    <script src="{{asset('plugins/nprogress/nprogress.js')}}"></script>
  </head>
  <body class="navbar-fixed sidebar-fixed" id="body">
    <div class="wrapper">
      <aside class="left-sidebar sidebar-dark" id="left-sidebar">
        <div id="sidebar" style="background-color: #1a6abf;" class="sidebar sidebar-with-footer">
          <div class="app-brand">
            <a href="#">
              <img src="{{asset('images/logo_angel_celeste.png')}}" style="border-radius: 5px;" alt="lOGO">
              <span class="brand-name" style="font-style: italic;">ÁNGEL S.R.L</span>
            </a>
          </div>
          <div class="sidebar-left" data-simplebar style="height: 100%;">
            <ul class="nav sidebar-inner" id="sidebar-menu">
              <li class="active">
                <a class="sidenav-item-link" href="{{route('personas.index')}}">
                  
                  <i class="fa fa-home" aria-hidden="true"></i>
                  <span class="nav-text">Inicio</span>
                </a>
              </li>
              <li class="section-title">
                MODULOS
              </li>
              <li  class="has-sub">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email"
                  aria-expanded="false" aria-controls="email">
                  <i class="fa fa-users" aria-hidden="true"></i>
                  <span class="nav-text">Usuarios</span> <b class="caret"></b>
                </a>
                <ul class="collapse" id="email" data-parent="#sidebar-menu">
                  <div class="sub-menu">              
                    @can('Personaindex')
                    <li>
                      <a class="sidenav-item-link" href="{{route('personas.index')}}">
                        <span class="nav-text">Personas</span>
                      </a>
                    </li>
                    @endcan
                    @can('Clienteindex')
                    <li >
                      <a class="sidenav-item-link" href="{{route('clientes.index')}}">
                        <span class="nav-text">Clientes</span>
                      </a>
                    </li>
                    @endcan
                    @can('Proveedorindex')
                    <li>
                      <a class="sidenav-item-link" href="{{route('proveedores.index')}}">
                        <span class="nav-text">Proveedores</span>
                      </a>
                    </li>
                    @endcan
                    @can('Usuarioindex')
                    <li>
                      <a class="sidenav-item-link" href="{{route('usuarios.index')}}">
                        <span class="nav-text">Usuarios</span>
                      </a>
                    </li>
                    @endcan
                    @can('Rolindex')
                    <li>
                      <a class="sidenav-item-link" href="{{route('roles.index')}}">
                        <span class="nav-text">Roles</span>
                      </a>
                    </li>
                    @endcan
                    @can('Permisoindex')
                    <li>
                      <a class="sidenav-item-link" href="{{route('permisos.index')}}">
                        <span class="nav-text">Permisos</span>
                      </a>
                    </li>
                    @endcan
                  </div>
                </ul>
              </li> 
              @can('ModuloProductos')
              <li  class="has-sub" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
                  aria-expanded="false" aria-controls="charts">
                  <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                  <span class="nav-text">Productos</span> <b class="caret"></b>
                </a>
                <ul  class="collapse"  id="charts"
                  data-parent="#sidebar-menu">
                  <div class="sub-menu">
                    @can('Categoriaindex')
                    <li >
                      <a class="sidenav-item-link" href="{{route('categorias.index')}}">
                        <span class="nav-text">Categorias</span>
                      </a>
                    </li>
                @endcan
                @can('Medidaindex')
                    <li >
                      <a class="sidenav-item-link" href="{{route('medidas.index')}}">
                        <span class="nav-text">Medidas</span>
                      </a>
                    </li>
                    @endcan
                    @can('Presentacionindex')
                    <li >
                      <a class="sidenav-item-link" href="{{route('presentaciones.index')}}">
                        <span class="nav-text">Presentaciones</span>
                      </a>
                    </li>
                    @endcan
                    @can('Productoindex')
                    <li >
                      <a class="sidenav-item-link" href="{{route('productos.index')}}">
                        <span class="nav-text">Productos</span>
                      </a>
                    </li>
                    @endcan
                    
                  </div>
                </ul>
              </li>
              @endcan
              <li  class="has-sub" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#vehiculos"
                  aria-expanded="false" aria-controls="compras">
                  <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                  <span class="nav-text">Compras</span> <b class="caret"></b>
                </a>
               
                  <ul  class="collapse"  id="vehiculos"
                  data-parent="#sidebar-menu">
                  <div class="sub-menu">
                    <li >
                      <a class="sidenav-item-link" href="{{route('compras.index')}}">
                        <span class="nav-text">Compras</span>
                      </a>
                    </li>
                  </div>
                </ul>
              
              
            </li> 
              <li  class="has-sub" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#vehiculos"
                  aria-expanded="false" aria-controls="vehiculos">
                  <i class="fa fa-car" aria-hidden="true"></i>
                  <span class="nav-text">Vehiculos</span> <b class="caret"></b>
                </a>
                @can('Vehiculosindex')
                  <ul  class="collapse"  id="vehiculos"
                  data-parent="#sidebar-menu">
                  <div class="sub-menu">
                    <li >
                      <a class="sidenav-item-link" href="{{route('vehiculos.index')}}">
                        <span class="nav-text">Vehiculos</span>
                      </a>
                    </li>
                  </div>
                </ul>
                @endcan
             
            </ul>
          </div>
        </div>
      </aside>
      <div class="page-wrapper">
        <header class="main-header" id="header">
          <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
            <button id="sidebar-toggler" class="sidebar-toggle">
              <span class="sr-only">Toggle navigation</span>
            </button>
            <div class="navbar-right ">
              <ul class="nav navbar-nav">
                <li class="dropdown user-menu">
                  <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="d-none d-lg-inline-block">{{ Auth::user()->persona->apellido}}</span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                      <a class="dropdown-link-item" href="{{ route('usuarios.edit', Auth::user()->id) }}">
                        <i class="mdi mdi-account-outline"></i>
                        <span class="nav-text">Perfil</span>
                      </a>
                    </li>
                    <li class="dropdown-footer">
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-link-item" href="{{route('login')}}" onclick="event.preventDefault();
                        this.closest('form').submit();"> <i class="mdi mdi-logout"></i> <span class="nav-text">Salir</span> </a>
                       
                    </form>
                     
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <div class="content-wrapper">
          @yield('contenido')
          <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; <span id="copy-year"></span> Distribuidora Angel S.R.L.
              </p>
            </div>
          </footer>
        </div>
      </div>
    </div>            
    <script>
      var d = new Date();
      var year = d.getFullYear();
      document.getElementById("copy-year").innerHTML = year;
      
    </script>

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('plugins/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('https://unpkg.com/hotkeys-js/dist/hotkeys.min.js')}}"></script>
    <script src="{{asset('plugins/apexcharts/apexcharts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script src="{{asset('plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-us-aea.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('https://cdn.quilljs.com/1.3.6/quill.js')}}"></script>
    <script src="{{asset('plugins/toaster/toastr.min.js')}}"></script>
    <script src="{{asset('js/mono.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/map.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/funcionesGenerales.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('js/funcionesGenerales.js')}}js/custom.js"></script>
    @yield('script')
  </body>
</html>
