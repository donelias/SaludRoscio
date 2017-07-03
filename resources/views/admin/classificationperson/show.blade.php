@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.classificationperson.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles General de Clasificacion/Persona {{ $classificationperson->classificationperson }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/classificationperson') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/classificationperson/' . $classificationperson->id . '/edit') }}" title="Edit classificationperson"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/classificationperson', $classificationperson->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete classificationperson',
                                    'onclick'=>'return confirm("Confirma eliminar la clasificacion de persona?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                             <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>Adulto-Pediatrico: </dt>
                                <dd>{{ $classificationperson->classificationperson }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $classificationperson->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $classificationperson->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
