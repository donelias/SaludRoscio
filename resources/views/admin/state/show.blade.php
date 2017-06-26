@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
        @include('admin.state.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles General de {{ $state->state }}</h4></div>
                   
                    <div class="panel-body">

                        <a href="{{ url('/admin/state') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/state/' . $state->id . '/edit') }}" title="Editar Estado"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/state', $state->state],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Estado',
                                    'onclick'=>'return confirm("Confirma eliminar el estado?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                         <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>Estado: </dt>
                                <dd>{{ $state->state }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $state->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $state->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
