@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.parish.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles de la Parroquia {{ $parish->parish }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/parish') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/parish/' . $parish->id . '/edit') }}" title="Editar Parroquia"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/parish', $parish->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Parish',
                                    'onclick'=>'return confirm("Confirma eliminar la Parroquia?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                         <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>Parroquia: </dt>
                                <dd>{{ $parish->parish }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $parish->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $parish->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
