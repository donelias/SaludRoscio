@extends('layouts.app')
        <!-- BOOTSTRAP CORE STYLE  -->
<link href="{{ asset('assets/css/bootstrap_invoice.css" rel="stylesheet') }}" />
<!-- CUSTOM STYLE  -->
<link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet" />
<!-- GOOGLE FONTS -->
<link href="{{ asset('assets/css/fonts.googleapis.css') }}" rel='stylesheet' type='text/css' />
@section('content')
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="col-xs-2 col-xs-offset-8">
                <h5 class="page-header">
                    <a href="{{ url('/order') }}" title="Back"><button class="btn btn-warning btn-block btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                </h5>
            </div>
            <div class="col-xs-2">
                <h5 class="page-header">
                    <a class="btn btn-success btn-block btn-xs" title="Imprimir" href="{{ url('order/pdf/' . $model->id) }}">
                        <i class="fa fa-file-pdf-o"></i> Imprimir
                    </a>
                </h5>
            </div>

                <div class="row pad-top-botm ">
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <img src="{{ asset('assets/img/salud.jpg')}}"  width="150" high="150" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <strong>  Coordinación Municipal de Salud Juan German Rosccio</strong>
                        <br />
                        <i>Dirección :</i> Av. Bolivar, frente a la plaza de los samanes,
                        <br />
                        San Juan de los Morros, Edo. Guarico,
                        <br />
                        Venezuela.

                    </div>
                </div>
                <div  class="row text-center contact-info">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <hr />
             <span>
                 <strong>Correo Electronico : </strong>  info@yourdomain.com
             </span>
             <span>
                 <strong>Telefono : </strong>  +58 - 246- 431- 2410
             </span>
              <span>
                 <strong>Fax : </strong>  +58 - 246- 431- 2410
             </span>
                        <hr />
                    </div>
                </div>
                <div  class="row pad-top-botm client-info">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h4>  <strong>Información {{$model->people->classificationperson->classificationperson}}</strong></h4>
                        <strong>  {{$model->people->name}} </strong>
                        <br />
                        <b>Address :</b> {{$model->people->addresses->street}}, NO. {{$model->people->addresses->N°_house}}, {{$model->people->addresses->sector->sector}}
                        <br />
                        Estado {{$model->people->addresses->sector->parish->municipality->state->state}}, Venezuela
                        <br />
                        <b>Telefono :</b> +90-908-567-0987
                        <br />
                        <b>Correo Electronico :</b> info@clientdomain.com
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">

                        <h4>  <strong>Orden de {{ $model->typeorder->typeorder}} </strong></h4>
                        <b># {{ str_pad ($model->id, 7, '0', STR_PAD_LEFT) }}</b>
                        <br />
                        Fecha Emision: {{ $model->created_at }}
                        <br />
                        <b>Estatus de Pago :  Donación </b>
                        <br />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Producto</th>
                                    <th>Tipo</th>
                                    <th>Gramos</th>
                                    <th>Cantidad</th>
                                    <th>Fecha Vencimiento</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($model->ordersproducts as $d)
                                    <tr>
                                        <td>{{$d->product->code}}</td>
                                        <td>{{$d->product->name}}</td>
                                        <td>{{$d->product->drug->drug}}</td>
                                        <td>{{$d->product->grams}}</td>
                                        <td>{{$d->quantity}}</td>
                                        <td>{{$d->product->expiration_date}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row pad-top-botm">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <hr />
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-lg-offset-4">
                            <br>
                            <hr />
                            <div class="col-lg-10 col-md-12 col-sm-12 col-lg-offset-1">
                                <strong class="text-center">Creada Por : </strong> {{$model->user->name}}
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="row pad-top-botm">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <hr />
                        <a href="{{ url('order/pdf/' . $model->id) }}" class="btn btn-success btn-xs btn-block" > <i class="fa fa-file-pdf-o"></i> Descargar</a>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection