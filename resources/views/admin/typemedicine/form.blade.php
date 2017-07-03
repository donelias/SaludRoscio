<div class="form-group {{ $errors->has('typemedicine') ? 'has-error' : ''}}">
    {!! Form::label('typemedicine', 'Tipo de Medicina', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('typemedicine', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
        {!! $errors->first('typemedicine', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="center" class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

        <a href="{{ url('/admin/typemedicine') }}" class="btn btn-danger"> Cancelar</a>
    </div>
</div>
   