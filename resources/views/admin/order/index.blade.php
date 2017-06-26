@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <br>
                <h3 class="text-center">Generar Nueva Orden</h3>
                <hr>
            </div>
            <div class="col-md-4 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                    <!-- Button trigger modal -->

                                
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-1">
                @if(count($cart))
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <di class="row">
                                <h3>Datos del Beneficiario</h3>
                                <lu>
                                    <li>rif: </li>
                                    <li>Nombre o Razon Social:</li>
                                    <li>Dirección: </li>
                                    <li>Telefono: </li>
                                </lu>
                            </di>
                        </div>
                        <div class="col-md-12 col-md-offset-0">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <p>
                                            <a href="{{ route('cart-trash') }}" class="btn btn-danger">
                                                Vaciar Orden <i class="fa fa-trash"></i>
                                            </a>
                                        </p>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Codigo Producto</th>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cart as $item)
                                                <tr>
                                                    <td>{{ $item->code }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        <input
                                                                type="number"
                                                                min="1"
                                                                max="100"
                                                                value="{{ $item->quantity }}"
                                                                id="product_{{ $item->id }}"
                                                        >
                                                        <a
                                                                href="#"
                                                                class="btn btn-warning btn-update-item"
                                                                data-href="{{ url('cart/update', $item->slug) }}"
                                                                data-id = "{{ $item->id }}"
                                                        >
                                                            <i class="fa fa-refresh"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('cart-delete', $item->code) }}" class="btn btn-danger">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else

                    <div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                    <h3 class="text-center"><span class="label label-warning">No hay productos en la orden:(</span></h3>
                @endif
            </div>

        </div>
    </div>
@endsection

