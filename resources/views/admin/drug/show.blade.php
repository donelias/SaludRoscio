@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.drug.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles General del Framaco {{ $drug->drug }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/drug') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/drug/' . $drug->id . '/edit') }}" title="Editar farmaco"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/drug', $drug->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Farmaco',
                                    'onclick'=>'return confirm("Confirma eliminar Farmaco?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                             <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>Adulto-Pediatrico: </dt>
                                <dd>{{ $drug->drug }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $drug->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $drug->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
