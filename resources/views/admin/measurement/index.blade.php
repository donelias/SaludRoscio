@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.measurement.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Listado General de los Farmaco</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/measurement/create') }}" class="btn btn-success btn-sm" title="Add New measurement">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/measurement', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Farmaco</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($measurement as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->measurement }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/admin/measurement/' . $item->id) }}" title="Ver measurement"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/measurement/' . $item->id . '/edit') }}" title="Editar measurement"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/measurement', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete measurement',
                                                        'onclick'=>'return confirm("Confirma Eliminar Direccion '.$item->measurement.'?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $measurement->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
