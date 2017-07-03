<html>
<head>
    <style>
        .header{color:#444;border-bottom:1px solid #ddd;padding:10px;}

        .client-detail{background:#ddd;padding:10px;}
        .client-detail th{text-align:left;}

        .items{border-spacing:0;}
        .items thead{background:#ddd;}
        .items tbody{background:#eee;}
        .items tfoot{background:#ddd;}
        .items th{padding:10px;}
        .items td{padding:10px;}

        h1 small{display:block;font-size:16px;color:#888;}

        header{text-align:center;}
        footer{padding-top:20pt;}
        img{width:60;high:60;}
        table{width:100%;}
        .text-right{text-align:right;}


    </style>
</head>
<body>

<header class="text-center">
    <img src="{{ asset('assets/img/logo3.png') }}" alt="">
    <h3>
        Coordinación Municipal de Salud Juan German Rosccio
        <br> ---------------------------------------------------
        <small class="text-center">
            <br>Av. Bolivar, Frente a la Plaza de los Samanes,<br> Sector Centro, San juan de de los Morros.<br>Telefono: 0246-431-2410
        </small>
    </h3>
</header>

<div class="header">
    <h1>
        Orden de Entrada # {{ str_pad ($model->id, 7, '0', STR_PAD_LEFT) }}
        <small>
            Emitido el {{ $model->created_at }}
        </small>
    </h1>
</div>
<table class="client-detail">
    <tr>
        <th style="width:100px;">
            Cliente
        </th>
        <td>{{ $model->people->name }}</td>
    </tr>
    <tr>
        <th>Ruc</th>
        <td>{{ $model->people->identificationcard }}</td>
    </tr>
    <tr>
        <th>Dirección</th>
        <td>{{$model->people->addresses->street}}, NO. {{$model->people->addresses->N°_house}}, {{$model->people->addresses->sector->sector}}</td>
    </tr>
</table>

<hr />

<table class="items">
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
<footer>

    Creada Por:
    <br>{{ $model->people->name }}

</footer>
</body>
</html>


<div class="col-xs-8">
    <h2 class="page-header">
        Orden de {{ $model->typeorder->typeorder}} No. {{ str_pad ($model->id, 7, '0', STR_PAD_LEFT) }}
    </h2>
</div>
<div class="col-xs-2">
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
<div class="well well-sm">
    <div class="row">
        <div class="col-xs-5">
            Proveedor <input class="form-control typeahead" type="text" readonly value="{{$model->people->name}}" />
        </div>
        <div class="col-xs-2">
            Ci o Rif<input class="form-control" type="text" readonly value="{{$model->people->identificationcard}}" />
        </div>
        <div class="col-xs-5">
            Direccón<input class="form-control" type="text" readonly value="{{$model->people->addresses->street}}, NO. {{$model->people->addresses->N°_house}}, {{$model->people->addresses->sector->sector}}" />
        </div>
    </div>
</div>
<hr/>
<h4 class="text-center">Detalles de la Orden</h4>
<hr>
<table class="table table-striped">
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
<hr>
<a class="btn btn-block btn-lg" href="{{ url('order/pdf/' . $model->id) }}">
    <i class="fa fa-file-pdf-o"></i> Imprimir Orden
</a>