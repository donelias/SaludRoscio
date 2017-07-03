<div class="bg-dark dk" id="wrap">
    <div id="top">
        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">

                <!-- Brand and toggle get grouped for better mobile display -->
                <header class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h3>Sistema Gestion de Insumos-Medicamentos</h3>
                </header>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <!-- .nav -->
                    <ul class="nav navbar-nav navbar-right">
                        <li @if(Route::is('home')) class="active" @endif >
                            <a href="{{url('/home')}}"> 
                                <i class="fa fa-home" aria-hidden="true"></i> Panel Principal
                            </a>
                        </li>
                        @if(Auth::user()->role_id == '1')
                            <li>
                                <a href="{{url('/admin/usuario')}}">
                                    <i class="fa fa-users" aria-hidden="true"></i> Usuarios
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{url('/admin/product')}}"> 
                                <i class="fa fa-th-list" aria-hidden="true"></i> Inventario
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/admin/people')}}"> 
                                <i class="fa fa-users" aria-hidden="true"></i> Personas
                            </a>
                        </li>
                        <li @if(Url('/order')) class="active" @endif  >
                            <a href="{{url('/order')}}">
                                <i class="fa fa-list-alt" aria-hidden="true"></i> Ordenes
                            </a>
                        </li>
                        <li class='dropdown '>
                             @if(Auth::user()->role_id == '1')
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-secret" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                             @endif
                             @if(Auth::user()->role_id == '2')
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">   
                                    <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                 </a>
                             @endif
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <a href="{{url('/home')}}" class="navbar-brand">
                                    <img src="{{ asset('assets/img/logo2.png') }}" alt="">
                                </a>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.nav -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->

        <header class="navbar-header">
            <img src="{{ asset('assets/img/as.png') }}">
        </header>
        <h2 class="text-center">
            <i><a class="fa fa-home" href="{{url('/home')}}">&nbsp; Salud Roscio</a></i>
        </h2>
    </div>
    <!-- /.main-bar -->
    <!-- /.head -->
</div>

<!-- /#top -->
<div id="left">
    <div class="media user-media bg-dark dker">
        <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
        </div>
        <div class="user-wrapper bg-dark">
         @if(Auth::user()->role_id == '1')
            <div class="media-body">
            <br>
                 <h3 class="media-heading"> BIENVENIDO  <br>
             {{ Auth::user()->name }} <span class="true"></span></h3>
            <ul class="list-unstyled user-info">
                                    
                 <li><a href="{{url('/admin/user/show/1')}}"><i class="fa fa-user-secret" aria-hidden="true"></i> Ver Detalles </a></li> 
         @endif

             @if(Auth::user()->role_id == '2')
                    <div class="media-body">
                 <br>
                 <h3 class="media-heading"> BIENVENIDO  <br>
                     {{ Auth::user()->name }} <span class="true"></span></h3>
                 <ul class="list-unstyled user-info">
                                    
                 <li><a href="{{url('/admin/user/show/1')}}"><i class="fa fa-user" aria-hidden="true"></i> Ver Detalles </a></li> 
            @endif

                    <li>Ultimo Acceso : <br>
                        <small><i class="fa fa-calendar"></i> {{ Auth::user()->last_login->format('d/m/Y') }}</small>
                        <br>
                        <small><i class="fa fa-clock-o"></i> {{ Auth::user()->last_login->format('h:i:s a') }}</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- #menu -->
    <ul id="menu" class="bg-dark dker alto">
        <li class="nav-header">Menu</li>
        <li class="nav-divider"></li>
        <li @if(Route::is('home')) class="active" @endif>
            <a href="{{url('/home')}}"> <i class="fa fa-home" aria-hidden="true"></i> Panel Principal</a>
        </li>
        <li class="">
            @if(Auth::user()->role_id == '1')
                <a href="javascript:;">
                    <i class="fa fa-user-secret"></i>
                    <span class="link-title">Administrador</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="{{ route('user') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Usuarios </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/role') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Role </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/laboratory') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Laboratorios </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/typemedicine') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Tipo de Medicinas </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/classification') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Clasificacion de Medicinas </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/drug') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Farmaco de Medicinas </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/classificationperson') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Clasificación/personas </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/statu') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Estatus </a>
                    </li>
                </ul>
            @endif
             @if(Auth::user()->role_id == '2')
                <a href="javascript:;">
                   <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="link-title">Usuario</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="{{ route('user') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Usuarios </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/role') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Role </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/laboratory') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Laboratorios </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/typemedicine') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Tipo de Medicinas </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/classification') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Clasificacion de Medicinas </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/drug') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Farmaco de Medicinas </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/classificationperson') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Clasificación/personas </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/statu') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Estatus </a>
                    </li>
                </ul>
            @endif
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <span class="link-title">Ordenes</span>
                  <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="{{ url('admin/order') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Lista General </a>
                    </li>
                    <li>
                        <a href="{{ url('/order/into') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Entrada </a>
                    </li>
                    <li>
                        <a href="{{ url('/order/out') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Salida </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="link-title">Personas</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="{{url('/admin/people')}}">
                            <i class="fa fa-angle-right"></i>&nbsp; Lista General </a>
                    </li>
                    <li>
                        <a href="{{url('/people/proveedores/1')}}">
                            <i class="fa fa-angle-right"></i>&nbsp; Proveedores </a>
                    </li>
                    <li>
                        <a href="{{url('/people/pacientes/3')}}">
                            <i class="fa fa-angle-right"></i>&nbsp; Pacientes </a>
                    </li>
                     <li>
                        <a href="{{url('/people/empleados/4')}}">
                            <i class="fa fa-angle-right"></i>&nbsp; Empleados </a>
                    </li>
                    <li>
                        <a href="{{url('/people/ambulatorios/5')}}">
                            <i class="fa fa-angle-right"></i>&nbsp; Ambulatorios </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    <span class="link-title">Productos</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="{{url('/admin/product')}}">
                            <i class="fa fa-angle-right"></i> Lista General
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.type', 1) }}">
                            <i class="fa fa-angle-right"></i> Antibióticos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.type', 7) }}">
                            <i class="fa fa-angle-right"></i> Antivirales
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.type', 2) }}">
                            <i class="fa fa-angle-right"></i> Antiparasitorios
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.type', 5) }}">
                            <i class="fa fa-angle-right"></i> Analgésicos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.type', 6) }}">
                            <i class="fa fa-angle-right"></i> Antialergicos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.type', 3) }}">
                            <i class="fa fa-angle-right"></i> Antigripales
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product.type', 4) }}">
                            <i class="fa fa-angle-right"></i> Broncodilatador
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span class="link-title">Direcciones</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse">
                    <li>
                        <a href="{{ url('admin/state') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Estados </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/municipality') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Municipios </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/parish') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Parroquias </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/sector') }}">
                        <i class="fa fa-angle-right"></i>&nbsp; Sectores </a>
                    </li>
                </ul>
            </li>
        </li>
        <li class="">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                <h5 class="lead">
                    <i class="fa fa-sign-out" aria-hidden="true"> Salir del Sistema</i>
                </h5>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        <br>
        <br>
        <br>
        <footer class="Footer bg-dark dker">
            <p>2017 &copy; Salud Roscio</p>
        </footer>
        <!-- /#footer -->
    <!-- /#menu -->
</div>
