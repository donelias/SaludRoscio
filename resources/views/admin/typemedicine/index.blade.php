@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.typemedicine.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Listado General de los Tipos de Medicamentos</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/typemedicine/create') }}" class="btn btn-success btn-sm" title="Agregar tipo de medicina">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/typemedicine', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                       <th>Tipo de Medicamento</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($typemedicine as $item)
                                    <tr>
                                    
                                        <td>{{ $item->typemedicine }}</td>
                                      
                                        <td>
                                            
                                            <a href="{{ url('/admin/typemedicine/' . $item->id) }}" title="Ver tipo medicina"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/typemedicine/' . $item->id . '/edit') }}" title="Editar tipo medicina"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/typemedicine', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Eliminar tipo de medicina',
                                                        'onclick'=>'return confirm("Confirma Eliminar tipo de medicina '.$item->typemedicine.'?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $typemedicine->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
