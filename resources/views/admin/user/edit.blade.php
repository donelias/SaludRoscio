@extends('layouts.app')


@section('content')
<div id="content">
	<div class="outer">
		<div class="inner bg-light lter">
			@include('admin.user.sidebar')
			<div class="col-lg-12">
					<div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Editar Usuario {{ $user->name }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($user, [
                            'method' => 'POST',
                            'url' => ['/admin/user/edit', $user->id],
                            'class' => 'form-horizontal',
                            'files' => true
		                        ]) !!}
								<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
								    {!! Form::label('name', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
								    <div class="col-md-6">
								        {!! Form::text('name', null, ['class' => 'form-control']) !!}
								        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
								    </div>
								</div><div class="form-group {{ $errors->has('user') ? 'has-error' : ''}}">
								    {!! Form::label('user', 'Usuario', ['class' => 'col-md-4 control-label']) !!}
								    <div class="col-md-6">
								        {!! Form::text('user', null, ['class' => 'form-control']) !!}
								        {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
								    </div>
								</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
								    {!! Form::label('email', 'Correo Electronico', ['class' => 'col-md-4 control-label']) !!}
								    <div class="col-md-6">
								        {!! Form::text('email', null, ['class' => 'form-control']) !!}
								        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
								    </div>
								    <br>
								    <br>
								        <br>
                                <div class="form-group">
                                   <div class="col-md-4 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                            Editar
                                        </button>
                                    </div>

                                     <div class="col-md-4 col-md-offset-0">
                                        
                                        <a href="{{ route('user') }}" class="btn btn-danger btn-block"><i class="fa fa-user-times" aria-hidden="true"></i> Cancelar</a>
                                    </div>
                                   
                                </div>
 
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
			</div>
			
		</div>
		<!-- /.inner -->
	</div>
	<!-- /.outer -->
</div>
<!-- /#content -->
</div>

@endsection