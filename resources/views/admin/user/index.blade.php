@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="row" style="margin:20px">
            <div class="col-lg-10">
                <hr />
                <strom><i class="fa fa-list-alt fa-3x" aria-hidden="true"> Lista de Usuarios</i> </strom>
                <hr />
                <div class="panel panel-default">
                    <div style="margin:7px">
                        <div class="col-xs-6">
                            <div class="btn-group">
                                <a  href="{{ route('user-add') }}" class="btn btn-info"><span><i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva Persona</span></a>
                            </div>
                        </div>
                      {!! Form::open(['method' => 'GET', 'url' => '/admin/usuario', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar..">
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
                                <th style="width:10px;">Nombre</th>
                                <th style="width:10px;">Usuario</th>

                                <th style="width:1px">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->user}}</td>
                                  

                                    <td>

                                           <a href="{{ url('/admin/user/show', $user->id) }}" class="btn btn-success btn-xs" title="Ver"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/edit', $user->id) }}" class="btn btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/delete-usuario', $user->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Eliminar',
                                                        'onclick'=>'return confirm("esta seguro que desea eliminar el usuario?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                            </tr>
                        @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



