<div class="form-group {{ $errors->has('typeperson') ? 'has-error' : ''}}">
    {!! Form::label('typeperson', 'Tipo de Persona', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
       {!! Form::text('typeperson', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
        {!! $errors->first('typeperson', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="center" class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}
        <a href="{{ url('/admin/typeperson') }}" class="btn btn-danger"> Cancelar</a>
    </div>
</div>
