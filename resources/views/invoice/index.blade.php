@extends('layouts.app')
<style>
    .btn-glyphicon { padding:10px; background:#ffffff; margin-right:4px; }
    .icon-btn { padding: 1px 15px 3px 2px; border-radius:50px;}
</style>
@section('content')
<div class="container">
    <div class="row" style="margin:20px">
        <div class="col-lg-10">
            <hr />
            <strom><i class="fa fa-list-alt fa-3x" aria-hidden="true"> Lista General de Ordenes</i> </strom>
            <hr />
                <div class="panel panel-default">
                    <div style="margin:7px">
                        <div class="col-xs-6">
                            <div class="btn-group">
                                <a data-toggle="modal" data-target="#myModal" class="btn btn-info"><span><i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva Orden</span></a>

                            </div>
                        </div>
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/order', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="panel-body" style="padding:0px">
                        <table class="table table-striped table-bordered" style="margin:0px">
                            <thead>
                            <tr>
                                <th style="width:200px;">Proveedor</th>
                                <th style="width:80px;" class="">No. Orden</th>
                                <th style="width:100px;" class="">Tipo Orden</th>
                                <th style="width:150px;" class="">Creado</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($order as $m)
                                <tr>
                                    <td>
                                        <a href="{{url('order/detail/' . $m->id )}}">
                                            {{$m->people->name}}
                                        </a>
                                    </td>
                                    <td class="">{{ str_pad ($m->id, 7, '0', STR_PAD_LEFT) }}
                                    @if($m->typeorder->typeorder== "ENTRADA")
                                        <td class=""><button class="glyphicon btn-glyphicon  img-circle text-success">Entrada</button></td>
                                    @else
                                        <td class=""><button class="glyphicon btn-glyphicon  img-circle text-info">Salida</button></td>
                                    @endif

                                    <td class="">{{ $m->created_at  }}</td>
                                    <td style="width:180px;" >
                                        <a class="btn btn-success btn-block btn-xs" href="{{ url('order/pdf/' . $m->id) }}">
                                            <i class="fa fa-file-pdf-o"></i> Descargar
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tr>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper text-center"> {!! $order->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                    <div class="panel-footer">
                        <div class="col-xs-3"><div class="dataTables_info" id="example_info"></div></div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@include('layouts.modal')
@endsection
