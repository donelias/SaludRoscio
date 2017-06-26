@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin:20px">
            <div class="col-lg-10">
                <hr />
                <strom><i class="fa fa-list-alt fa-3x" aria-hidden="true"> Lista General de Productos </i> </strom>
                <hr />
                <div class="panel panel-default">
                    <div style="margin:7px">
                        <div class="col-xs-2">
                            <div class="btn-group">
                                <a  href="{{ url('/admin/product/create') }}" class="btn btn-info"><span><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Producto</span></a>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="btn-group">
                                <a  href="{{ url('/order/into') }}" class="btn btn-success"><span><i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva Orden</span></a>
                            </div>
                        </div>
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/product', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th style="width:100px;">Codigo</th>
                                <th style="width:300px;">Nombre</th>
                                <th style="width:100px;">Medida</th>
                                <th style="width:100px;">Stock</th>
                                <th style="width:100px;">Fecha/V</th>
                                <th style="width:100px">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->grams }}</td>
                                    <td>{{ $item->quantityexisting }}</td>
                                    <td>{{ $item->expiration_date }}</td>

                                    <td>

                                        <a href="{{ url('/admin/product/' . $item->id) }}" title="Ver Producto"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                        <a href="{{ url('/admin/product/' . $item->id . '/edit') }}" title="Editar Producto"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/admin/product', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar Producto',
                                                'onclick'=>'return confirm("Desea eliminar el Producto '.$item->name.'?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="panel-footer">
                        <div class="pagination-wrapper"> {!! $product->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
























