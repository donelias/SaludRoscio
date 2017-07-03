<div class="form-group {{ $errors->has('statu') ? 'has-error' : ''}}">
    {!! Form::label('statu', 'Estatu', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('statu', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
        {!! $errors->first('statu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="center" class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

        <a href="{{ url('/admin/statu') }}" class="btn btn-danger"> Cancelar</a>
    </div>
</div>
