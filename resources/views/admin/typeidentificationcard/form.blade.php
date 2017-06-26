<div class="form-group {{ $errors->has('typeidentificationcard') ? 'has-error' : ''}}">
    {!! Form::label('typeidentificationcard', 'Farmaco', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('typeidentificationcard', null, ['class' => 'form-control']) !!}
        {!! $errors->first('typeidentificationcard', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
  