
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', 'Codigo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      
        {!! Form::text('code', old('code'), ['class' => 'form-control']) !!}
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
        
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="center form-group {{ $errors->has('grams') ? 'has-error' : ''}}">

    {!! Form::label('grams', 'Medidas', ['class' => 'col-md-4 control-label']) !!}
       <div class="col-md-2">
              {!! Form::select('measurement_id', $measurements, old('measurement_id'), ['class' => 'form-control']) !!}

             </div> 
    <div class="col-md-4">
        {!! Form::text('grams', old('grams'), ['class' => 'form-control']) !!}
        {!! $errors->first('grams', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">

        
 </div>
 

<div class="form-group {{ $errors->has('expiration_date') ? 'has-error' : ''}}">
    {!! Form::label('expiration_date', 'Fecha de Expiracion', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class='input-group date' id='datetimepicker1'>
            {!! Form::text('expiration_date', old('expiration_date'), ['class' => 'form-control', 'placeholder' => "AAAA-MM-DD"]) !!}
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
        
        {!! $errors->first('expiration_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantityproduct') ? 'has-error' : ''}}">
    {!! Form::label('quantityproduct', 'Cantidad de Producto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('quantityproduct', old('quantityproduct'), ['class' => 'form-control']) !!}
        {!! $errors->first('quantityproduct', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    {!! Form::label('photo', 'Foto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    
<input type="file" name="photo" required/>
       
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
      <label for="password-confirm" class="col-md-4 control-label">Laboratorio </label>
            <div class="col-md-6">
              {!! Form::select('laboratory_id', $laboratories, old('laboratory_id'), ['class' => 'form-control']) !!}
             </div> 
 </div>
<div class="form-group">
      <label for="password-confirm" class="col-md-4 control-label">Tipo de Medicina </label>
            <div class="col-md-6">
              {!! Form::select('typemedicine_id', $typemedicines, old('typemedicine_id'), ['class' => 'form-control']) !!}
             </div> 
 </div>

 <div class="form-group">
      <label for="password-confirm" class="col-md-4 control-label">Tipo de Clasificacion</label>
            <div class="col-md-6">
              {!! Form::select('classification_id', $classifications, old('classification_id'), ['class' => 'form-control']) !!}
             </div> 
 </div>


 <div class="form-group">
      <label for="password-confirm" class="col-md-4 control-label">Tipo de Farmaco</label>
            <div class="col-md-6">
              {!! Form::select('drug_id', $drugs, old('drug_id'), ['class' => 'form-control']) !!}
             </div> 
 </div>

<div class="center" class="form-group">
    <div class="col-md-5 col-md-offset-6">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

        <a href="{{ url('/admin/product') }}" class="btn btn-danger"> Cancelar</a>
    </div>
</div>