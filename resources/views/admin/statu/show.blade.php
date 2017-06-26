@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.statu.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles General del Estatu {{ $statu->statu }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/statu') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/statu/' . $statu->id . '/edit') }}" title="Editar farmaco"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/statu', $statu->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Eliminar Estatu',
                                'onclick'=>'return confirm("Confirma eliminar Farmaco?")'
                        ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                        <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>Estatu: </dt>
                                <dd>{{ $statu->statu }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $statu->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $statu->updated_at }}</dd>
                                <br>

                            </dl>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
