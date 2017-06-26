@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.measurement.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles General del Framaco {{ $measurement->measurement }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/measurement') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/measurement/' . $measurement->id . '/edit') }}" title="Edit measurement"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/measurement', $measurement->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete measurement',
                                    'onclick'=>'return confirm("Confirma eliminar Direccion?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                             <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>N° de Farmaco: </dt>
                                <dd>{{ $measurement->id }}</dd>
                                <br>
                                <dt>Adulto-Pediatrico: </dt>
                                <dd>{{ $measurement->measurement }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $measurement->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $measurement->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
