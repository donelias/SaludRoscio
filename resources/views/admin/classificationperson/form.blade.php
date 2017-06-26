<div class="form-group {{ $errors->has('classificationperson') ? 'has-error' : ''}}">
    {!! Form::label('classificationperson', 'Farmaco', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('classificationperson', null, ['class' => 'form-control']) !!}
        {!! $errors->first('classificationperson', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="center" class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

        <a href="{{ url('/admin/classificationperson') }}" class="btn btn-danger"> Cancelar</a>
    </div>
</div>
  