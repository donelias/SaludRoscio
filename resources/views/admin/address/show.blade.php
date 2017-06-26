@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.address.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4 class="text-center">Detalles de la Direccion {{ $address->address }}</h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/address') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/address/' . $address->id . '/edit') }}" title="Edit address"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/address', $address->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Address',
                                    'onclick'=>'return confirm("Confirma eliminar Direccion?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                             <div class="panel-body">
                            <hr>
                            <dl class="dl-horizontal">

                                <dt>N° de Direccion: </dt>
                                <dd>{{ $address->id }}</dd>
                                <br>
                                <dt>Calle: </dt>
                                <dd>{{ $address->street }}</dd>
                                <br>
                                <dt>N° de Casa: </dt>
                                <dd>{{ $address->N°_house }}</dd>
                                <br>
                                <dt>Fecha/Creacion: </dt>
                                <dd>{{ $address->created_at }}</dd>
                                <br>
                                <dt>Fecha/Modificacion: </dt>
                                <dd>{{ $address->updated_at }}</dd>
                                <br>
                             
                            </dl>
                         </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
