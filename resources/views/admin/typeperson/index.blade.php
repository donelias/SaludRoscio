@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="row" style="margin:20px">
            <div class="col-lg-10">
                <hr />
                <strom><i class="fa fa-list-alt fa-3x" aria-hidden="true"> Lista de Tipos de Personas</i> </strom>
                <hr />
                <div class="panel panel-default">
                    <div style="margin:7px">
                        <div class="col-xs-6">
                            <div class="btn-group">
                                <a  href="{{ url('/admin/typeperson/create') }}" class="btn btn-info"><span><i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva Persona</span></a>
                            </div>
                        </div>
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

                    </div>
                    <div class="panel-body" style="padding:0px">
                        <table class="table table-striped table-bordered" style="margin:0px">
                            <thead>
                            <tr>
                                <th style="width:10px;">Tipos de Personas</th>
                    
                                <th style="width:1px">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($typeperson as $item)
                                <tr>
                                    <td>{{ $item->typeperson }}</td>
                                  

                                    <td>

                                        <a href="{{ url('/admin/typeperson/' . $item->id) }}" title="Ver el tipo de persona"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                        <a href="{{ url('/admin/typeperson/' . $item->id . '/edit') }}" title="Editar el tipo de persona"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/admin/typeperson', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar el tipo de persona',
                                                'onclick'=>'return confirm("Confirma Eliminar el tipo de persona '.$item->typeperson.'?")'
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
                            <div class="pagination-wrapper"> {!! $typeperson->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



