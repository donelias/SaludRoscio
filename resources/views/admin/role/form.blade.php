<form method="post" id="formid">
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    {!! Form::label('role', 'Role', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('role', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
        {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
    </div>
</div>
    <div class="center" class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

            <a href="{{ url('/admin/role') }}" class="btn btn-danger"> Cancelar</a>
        </div>
    </div>

</form>