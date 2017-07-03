<div class="form-group {{ $errors->has('sector') ? 'has-error' : ''}}">
    {!! Form::label('sector', 'Sector', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
       {!! Form::text('sector', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
        {!! $errors->first('sector', '<p class="help-block">:message</p>') !!}
    </div>
</div>

  <div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Parroquia</label>

      <div class="col-md-6">
        {!! Form::select('parish_id', $parishes, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="center" class="form-group">
    <div class="col-md-6 col-md-offset-5">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

        <a href="{{ url('/admin/sector') }}" class="btn btn-danger"> Cancelar</a>
    </div>
</div>
