@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.role.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles del Role {{ $role->role }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/role') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/role/' . $role->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/role', $role->name],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Role',
                                    'onclick'=>'return confirm("Confirma eliminar role?")'
                            ))!!}
                        {!! Form::close() !!}
                       
                            <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>Role: </dt>
                                <dd>{{ $role->role }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $role->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $role->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 