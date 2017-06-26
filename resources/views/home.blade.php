@extends('layouts.app')

@section('content')
    <sapm class="text-center"><h1>Panel de Administracion</h1></sapm>
    <hr>
    <div class="container">
        <div class="row">
            <div class="row text-center">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5">
                        <div class="offer offer-radius offer-primary" >
                            <div class="shape">
                                <div class="shape-text">
                                    <span class="glyphicon glyphicon-th-list"></span>
                                </div>
                            </div>
                            <div class="offer-content">
                                <a data-toggle="modal" data-target="#myModal">
                                    <h4 class="lead">
                                        <i class="fa fa-list-alt fa-2x" aria-hidden="true"> Ordenes</i>

                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5">
                        <div class="offer offer-radius offer-warning" >
                            <div class="shape">
                                <div class="shape-text">
                                    <span class="glyphicon  glyphicon-file"></span>
                                </div>
                            </div>
                            <div class="offer-content">
                                <a href="{{url('admin/product')}}">
                                    <h4 class="lead">
                                        <i class="fa fa-th-list fa-2x" aria-hidden="true"> Inventario</i>

                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5">
                    <div class="offer offer-radius offer-success" >
                        <div class="shape">
                            <div class="shape-text">
                                <span class="glyphicon  glyphicon-folder-open"></span>
                            </div>
                        </div>
                        <div class="offer-content">
                            <a href="{{url('/people/proveedores/1')}}">
                                <h4 class="lead">
                                    <i class="fa fa-address-card-o fa-2x" aria-hidden="true"> Proveedores</i>
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5">
                    <div class="offer offer-radius offer-info" >
                        <div class="shape">
                            <div class="shape-text">
                                <span class="glyphicon glyphicon-book"></span>
                            </div>
                        </div>
                        <div class="offer-content">
                            <a href="{{url('/people/pacientes/3')}}">
                                <h4 class="lead">
                                    <i class="fa fa-address-book fa-2x" aria-hidden="true"> Pacientes</i>
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5">
                    <div class="offer offer-radius offer-info" >
                        <div class="shape">
                            <div class="shape-text">
                                <span class="glyphicon glyphicon-book"></span>
                            </div>
                        </div>
                        <div class="offer-content">
                            <a href="{{url('/people/empleados/4')}}">
                                <h4 class="lead">
                                    <i class="fa fa-address-book fa-2x" aria-hidden="true"> Empleados</i>
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5 col-md-offset-5">
                    <div class="offer offer-radius offer-danger" >
                        <div class="shape">
                            <div class="shape-text">
                                <span class="glyphicon glyphicon-off"></span>
                            </div>
                        </div>
                        <div class="offer-content">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <h4 class="lead">
                                    <i class="fa fa-sign-out fa-2x" aria-hidden="true"> Salir del Sistema</i>
                                </h4>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('layouts.modal')
    </div>
@endsection
