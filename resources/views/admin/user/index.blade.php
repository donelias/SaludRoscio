@extends('layouts.app')

@section('content')
<div id="content">
	<div class="outer">
		<div class="inner bg-light lter">
			@include('admin.user.sidebar')
			<div class="col-lg-9 col-lg-offset-1">
					<div class="panel panel-info">
					<div class="panel-heading"><h4 class="text-center">Listado General de los Usuarios</h4></div>
					<div class="panel-body">
                        <a href="{{ route('user-add') }}" class="btn btn-success btn-sm" title="Agrgar Nuevo Usuario">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Agregar nuevo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/usuario', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar..">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
						<br/>
                        <br/>
					<table class="table table-striped">
					  <thead>
					  	
					  	<th>Nombre</th>
					  	<th>Usuario</th>
					  	<th>Acciones</th>

					  </thead>
					  <tbody>
					  	
					  	@foreach($users as $user)
					  		<tr>
					  		
					  		<td>{{ $user->name}}</td>
					  		<td>{{ $user->user}}</td>
					  		
					  		<td>
                                            <a href="{{ url('/admin/user/show', $user->id) }}" class="btn btn-success btn-xs" title="Ver"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/edit', $user->id) }}" class="btn btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/delete-usuario', $user->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Eliminar',
                                                        'onclick'=>'return confirm("esta seguro que desea eliminar el usuario?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
					  		</tr>
					  	@endforeach
					  </tbody>
					  	

					</table>
					<br>
					<br>
						<br>
						<br>
						<br>
					</div>
			</div>
			{!! $users->render() !!}
		</div>
		</div>
		<!-- /.inner -->
	</div>
	<!-- /.outer -->
</div>
<!-- /#content -->
</div>
@endsection 