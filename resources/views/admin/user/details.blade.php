@extends('layouts.app')

@section('content')
	<div id="content">
		<div class="outer">
			<div class="inner bg-light lter">
				@include('admin.user.sidebar')
				<div class="col-lg-9 col-lg-offset-1">
					<div class="panel panel-info">
						<div class="panel-heading"><h4 class="text-center">Detalles General de {{ $users->name }}</h4></div>
						 
						<a href="{{ route('user') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
						 <a href="{{ url('/admin/edit', $users->id) }}" class="btn btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/> Editar</a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/delete-usuario', $users->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar" /> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Eliminar',
                                                        'onclick'=>'return confirm("esta seguro que desea eliminar el usuario?")'
                                                )) !!}
                                            {!! Form::close() !!}
						<div class="panel-body">
							<hr>
							<dl class="dl-horizontal">
								<dt>Nombre y Apellido: </dt>
								<dd>{{ $users->name }}</dd>
								<br>
								<dt>Usuario: </dt>
								<dd>{{ $users->user }}</dd>
								<br>
								<dt>Correo Electronico: </dt>
								<dd>{{ $users->email }}</dd>
								<br>
								<dt>Tipo de Usuario: </dt>
								<dd>{{ $users->role->role }}</dd>
								<br>
								<dt>Fecha/Creacion: </dt>
								<dd>{{ $users->created_at }}</dd>
								<br>
								<dt>Fecha/Modificacion: </dt>
								<dd>{{ $users->updated_at }}</dd>
 
							</dl>
							<br>
							<br> 
							<br>
							<br> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection