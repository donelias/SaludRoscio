<div class="form-group {{ $errors->has('municipality') ? 'has-error' : ''}}">
    {!! Form::label('municipality', 'Municipio', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
       {!! Form::text('municipality', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
        {!! $errors->first('municipality', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Estado</label>

        <div class="col-md-6">
           {!! Form::select('state_id', $states, null, ['class' => 'form-control']) !!}
  </div> 
</div>

<div class="center" class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

        <a href="{{ url('/admin/municipality') }}" class="btn btn-danger"> Cancelar</a>
    </div>
</div>
 