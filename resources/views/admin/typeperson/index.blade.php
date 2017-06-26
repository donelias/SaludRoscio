@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.typeperson.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Listado General de los Tipo de Personas</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/typeperson/create') }}" class="btn btn-success btn-sm" title="Nuevo Tipo de Persona">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/typeperson', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                       <th>Nombre del Tipo de Persona</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($typeperson as $item)
                                    <tr>
                                    
                                        <td>{{ $item->typeperson }}</td>
                                        <td>
                                            <a href="{{ url('/admin/typeperson/' . $item->id) }}" title="Ver Tipo de Persona"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/typeperson/' . $item->id . '/edit') }}" title="Editar Tipo de Persona"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/typeperson', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Eliminar Tipo de Persona',
                                                        'onclick'=>'return confirm("Desea eliminar el Tipo de Persona '.$item->typeperson.'?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $typeperson->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
