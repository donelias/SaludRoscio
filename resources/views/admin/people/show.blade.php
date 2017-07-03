@extends('layouts.app')

@section('content') 
    <div class="container">
        <div class="col-md-10">
            <hr>
            <div class="jumbotron">
                <div class="row panel panel">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        <div class="container" style="border-bottom:1px solid black">
                            <h2>{{ $people->name }}</h2>
                        </div>
                        <hr>
                        <ul class="container details">
                            <li><p><span class="fa fa-id-card" aria-hidden="true" style="width:50px;"></span>{{ $people->identificationcard }}</p></li>
                            <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>{{ $people->phone }}</p></li>
                            <li><p><span class="fa fa-user-o" aria-hidden="true" style="width:50px;"></span>{{ $people->typeperson->typeperson }}</p></li>
                            <li><p><span class="fa fa-user-o" aria-hidden="true" style="width:50px;"></span>{{ $people->classificationperson->classificationperson }}</p></li>
                            <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span>CALLE {{$people->addresses->street}}, N° CASA {{$people->addresses->N°_house}}, SECTOR {{$people->addresses->sector->sector}}, PARROQUIA
                                    {{$people->addresses->sector->parish->parish}}, MUNICIPIO {{$people->addresses->sector->parish->municipality->municipality}},
                                    ESTADO {{$people->addresses->sector->parish->municipality->state->state}}</p></a>
                            <li><p><span class="fa fa-calendar" aria-hidden="true" style="width:50px;"></span>{{ $people->created_at }}</p></a>
                        </ul>
                        <a href="{{ url('/admin/people') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/people/' . $people->id . '/edit') }}" title="Editar persona"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/people', $people->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete persona',
                                'onclick'=>'return confirm("Confirma eliminar persona?")'
                        ))!!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
                <h3 class="text-center"> Ordenes Asignadas</h3>
                <hr>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width:100px;" class="">No. Orden</th>
                        <th style="width:100px;" class="">Tipo Orden</th>
                        <th style="width:180px;" class="">Creado</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($people->order as $m)
                        <tr>
                            <td>
                                <a href="{{url('order/detail/'.$m->id )}}">
                                    {{ str_pad ($m->id, 7, '0', STR_PAD_LEFT) }}
                                </a>
                            </td>
                            <td>{{$m->typeorder->typeorder}}</td>
                            <td>{{$m->created_at}}</td>
                            <td class="text-right">
                                <a class="btn btn-success btn-block btn-xs" href="{{ url('invoice/pdf/') }}">
                                    <i class="fa fa-file-pdf-o"></i> Descargar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
