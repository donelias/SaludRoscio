@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           @include('admin.sector.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles General de Sector {{ $sector->sector }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/sector') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/sector/' . $sector->id . '/edit') }}" title="Editar Sector"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/sector', $sector->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Sector',
                                    'onclick'=>'return confirm("Confirma eliminar el sector?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">
                            
                
                                <dt>Sector: </dt>
                                <dd>{{ $sector->sector }}</dd>
                                <br>

                                 <dt>Fecha/Creacion: </dt>
                                <dd>{{ $sector->created_at }}</dd>
                                <br>

                                 <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $sector->updated_at }}</dd>
                                <br>
                             
                            </dl>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
