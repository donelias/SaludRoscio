<div class="form-group {{ $errors->has('street') ? 'has-error' : ''}}">
    {!! Form::label('street', 'Calle', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('street', null, ['class' => 'form-control']) !!}
        {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('N°_house') ? 'has-error' : ''}}">
    {!! Form::label('N°_house', 'N° de Casa', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('N°_house', null, ['class' => 'form-control']) !!}
        {!! $errors->first('N°_house', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Sector</label>

        <div class="col-md-6">
           {!! Form::select('sector_id', $sectors, null, ['class' => 'form-control']) !!}
  </div> 
</div>

<div class="form-group">
    <div class="col-md-offset-5 col-md-2">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}
    </div>

</div>
  