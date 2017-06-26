@extends('layouts.app')
<link href="{{ asset('assets/css/style-product.css') }}" rel="stylesheet" />
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.product.sidebar')
            <div class="col-lg-10">
                <a href="{{ url('/admin/product') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Editar Producto"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['admin/product', $product->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Eliminar producto',
                        'onclick'=>'return confirm("Desea eliminar el Producto '.$product->name.'?")'
                ))!!}
                {!! Form::close() !!}
                    <div class="card">
                        <div class="container-fliud">
                            <div class="wrapper row">
                                <div class="preview col-md-6">
                                    <div class="preview-pic tab-content">
                                        <div class="tab-pane active" id="pic-1"><img src="{{ asset($product->photo) }}"/></div>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <h3><div class="panel-title"><i class="fa fa-calendar-o" aria-hidden="true"></i>  Fecha Vencimiento</div></h3>
                                        <hr>
                                        <h3>{{ $product->expiration_date }}</h3>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <h3><div class="panel-title"><i class="fa fa-medkit" aria-hidden="true"></i>  Tipo de Medicamento</div></h3>
                                        <hr>
                                        <h4>{{ $product->typemedicine->typemedicine }}</h4>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <h3><div class="panel-title"><i class="fa fa-calendar-o" aria-hidden="true"></i>  Fecha Creacion</div></h3>
                                        <hr>
                                        <h4>{{ $product->created_at }}</h4>
                                    </div>

                                </div>
                                <div class="details col-md-6">
                                    <div class="panel panel-default text-center">
                                        <h3><div class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>   Nombre</div></h3>
                                        <hr>
                                        <h4>{{ $product->name }}</h4>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <div class="rating">
                                            <h3><div class="panel-title"><span class="glyphicon glyphicon-info-sign"></span>  Codigo</div></h3>
                                            <hr>
                                            <h4>{{ $product->code }}</h4>
                                        </div>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <h3><div class="panel-title"><i class="fa fa-calculator" aria-hidden="true"></i>   Medida</div></h3>
                                        <hr>
                                        <h4>{{ $product->grams }} {{ $product->measurement->measurement }}</h4>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <h3><div class="panel-title"><i class="fa fa-list" aria-hidden="true"></i>  Tipo de Farmaco</div></h3>
                                        <hr>
                                        <h4>{{ $product->drug->drug }}</h4>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <h3><div class="panel-title"><i class="fa fa-medkit" aria-hidden="true"></i>  Clasificacion</div></h3>
                                        <hr>
                                        <h4>{{ $product->classification->classification }}</h4>
                                    </div>
                                    <div class="panel panel-default text-center">
                                        <h3><div class="panel-title"><span class="glyphicon glyphicon-scissors"></span>  Cantidad Unidades</div></h3>
                                        <hr>
                                        <h4>{{ $product->quantityproduct }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="{{ url('/admin/product') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                                <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Editar Producto"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['admin/product', $product->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Eliminar producto',
                                        'onclick'=>'return confirm("Desea eliminar el Producto '.$product->name.'?")'
                                ))!!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection
