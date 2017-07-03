@extends('layouts.app')

@section('content')
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            @include('admin.user.sidebar')
            <div class="col-lg-12">
                <div class="col-md-8 col-md-offset-2">
                <h2>Crear Nuevo Usuario</h2>
                <hr>
                    <div class="panel panel-info">
                        <div class="panel-heading">Ingrese los Datos</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('user-create') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nombre</label>

                                    <div class="col-md-6">
                                        
                                        {!! Form::text('name', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                        @if ($errors->has('name'))

                                            <span class="help-block">

                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                                    <label for="user" class="col-md-4 control-label">Usuario</label>

                                    <div class="col-md-6">
                                        {!! Form::text('user', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}

                                        @if ($errors->has('user'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('user') }}</strong>
                                            </span>user
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Tipo de Usuario</label>

                                    <div class="col-md-6">
                                        {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
 
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                            Registrar
                                        </button>
                                    </div>
                                    <div class="col-md-4 col-md-offset-0">
                                        
                                        <a href="{{ route('user') }}" class="btn btn-danger btn-block"><i class="fa fa-user-times" aria-hidden="true"></i> Cancelar</a>
                                    </div>
                                   
                                </div>
                            </form>
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
