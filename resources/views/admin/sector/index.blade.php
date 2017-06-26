@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sector.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Listado General de los Sectores</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/sector/create') }}" class="btn btn-success btn-sm" title="Nuevo Sector">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo Sector
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/sector', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>Nombre del Sector</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sector as $item)
                                    <tr>
                                       
                                        <td>{{ $item->sector }}</td>
                                        <td>
                                            <a href="{{ url('/admin/sector/' . $item->id) }}" title="Ver Sector"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/sector/' . $item->id . '/edit') }}" title="Editar Sector"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/sector', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Eliminar Sector',
                                                        'onclick'=>'return confirm("Desea eliminar el sector '.$item->sector.'?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $sector->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
