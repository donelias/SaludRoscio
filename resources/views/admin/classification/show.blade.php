@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.classification.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles de la Clasificacion {{ $classification->classification }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/classification') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/classification/' . $classification->id . '/edit') }}" title="Edit classification"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/classification', $classification->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Clasificacion',
                                    'onclick'=>'return confirm("Confirma eliminar Direccion?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                             <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>Clasificacion: </dt>
                                <dd>{{ $classification->classification }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $classification->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $classification->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
