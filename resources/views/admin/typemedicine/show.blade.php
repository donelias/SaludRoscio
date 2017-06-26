@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.typemedicine.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles de los Tipos de Medicamentos {{ $typemedicine->typemedicine }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/typemedicine') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/typemedicine/' . $typemedicine->id . '/edit') }}" title="Editar tipo de medicina"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/typemedicine', $typemedicine->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar tipo de medicina',
                                    'onclick'=>'return confirm("Confirma eliminar tipon de medicina?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                             <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                             
                                <dt>Calle: </dt>
                                <dd>{{ $typemedicine->typemedicine }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $typemedicine->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $typemedicine->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
