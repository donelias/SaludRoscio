<div class="form-group {{ $errors->has('parish') ? 'has-error' : ''}}">
    {!! Form::label('parish', 'Parroquia', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('parish', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
        {!! $errors->first('parish', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Municipio</label>

        <div class="col-md-6">
           {!! Form::select('municipality_id', $municipalities, null, ['class' => 'form-control']) !!}
  </div> 
</div>

<div class="center" class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

        <a href="{{ url('/admin/parish') }}" class="btn btn-danger"> Cancelar</a>
    </div>
</div>
