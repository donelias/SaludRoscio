@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.parish.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Listado General de las Parroquias</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/parish/create') }}" class="btn btn-success btn-sm" title="Nuevo Parroquia">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nueva Parroquia
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/parish', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                       <th>Parroquia</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($parish as $item)
                                    <tr>
                                        <td>{{ $item->parish }}</td>
                                        <td>
                                            <a href="{{ url('/admin/parish/' . $item->id) }}" title="Ver Parroquia"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/parish/' . $item->id . '/edit') }}" title="Editar Parroquia"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/parish', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Eliminar Parroquia',
                                                        'onclick'=>'return confirm("Desea eliminar el estado '.$item->parish.'?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $parish->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
