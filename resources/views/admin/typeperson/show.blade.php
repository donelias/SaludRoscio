@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">  
        @include('admin.typeperson.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles General de {{ $typeperson->typeperson }}</h4></div> 
                    <div class="panel-body">

                        <a href="{{ url('/admin/typeperson') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/typeperson/' . $typeperson->id . '/edit') }}" title="Editar tipo de persona"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/typeperson', $typeperson->typeperson],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar tipo de persona',
                                    'onclick'=>'return confirm("Confirma eliminar el tipo de persona?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                         <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>Nombre del Tipo de Persona: </dt>
                                <dd>{{ $typeperson->typeperson }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $typeperson->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $typeperson->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
