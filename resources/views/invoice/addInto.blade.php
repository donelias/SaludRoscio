@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h4 class="page-header text-center">
                    <strom><i class="fa fa-list-alt fa-3x" aria-hidden="true"> Orden de Entrada</i> </strom>
                </h4>
                <div class="col-xs-2">
                    <div class="btn-group">
                        <a  href="{{ url('/admin/product/create') }}" class="btn btn-info"><span><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo Producto</span></a>
                    </div>
                </div>
                <div class="col-xs-2">
                    <div class="btn-group">
                        <a  href="{{ url('/people/create') }}" class="btn btn-success"><span><i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva Persona</span></a>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="btn-group">
                        <a  href="{{ url('/order') }}" class="btn btn-primary"><span><i class="fa fa-plus-circle" aria-hidden="true"></i> Ordenes</span></a>
                    </div>
                </div>
                <br>
                <br>
                <hr>
                <invoice></invoice>
            </div>
        </div>
    </div>

@endsection
@section('bottom')
    <script src="{{asset('components/orderInto.tag')}}" type="riot/tag"></script>
    <script>
        $(document).ready(function(){
            riot.mount('invoice');
        })
    </script>
@endsection

