<div class="form-group {{ $errors->has('drug') ? 'has-error' : ''}}">
    {!! Form::label('drug', 'Farmaco', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('drug', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
        {!! $errors->first('drug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="center" class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

        <a href="{{ url('/admin/drug') }}" class="btn btn-danger"> Cancelar</a>
    </div>
</div>
  