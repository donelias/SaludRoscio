@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.municipality.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles del Municipio {{ $municipality->municipality }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/municipality') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/municipality/' . $municipality->id . '/edit') }}" title="Editar Municipio"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/municipality', $municipality->municipality],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Municipality',
                                    'onclick'=>'return confirm("Confirma eliminar el municipio?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                             <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>Municipio: </dt>
                                <dd>{{ $municipality->municipality }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $municipality->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $municipality->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
