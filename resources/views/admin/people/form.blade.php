  <div class="col-md-offset-1 col-md-9"> 
        <div class="panel panel-default">
             <div class="panel-heading">Datos Personales</div>
                <div class="panel-body">
                    
                    <div class="form-group">
                         <label for="password-confirm" class="col-md-4 control-label">Tipo de Persona</label>

                            <div class="col-md-6">
                               {!! Form::select('typeperson_id', $typepersons, null, ['class' => 'form-control']) !!}
                           </div> 
                    </div>

                              <div class="form-group">
                         <label for="password-confirm" class="col-md-4 control-label">Clasificacion de Persona</label>

                            <div class="col-md-6">
                               {!! Form::select('classificationperson_id', $classificationpersons, null, ['class' => 'form-control']) !!}
                           </div> 
                    </div>


                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                             {!! Form::label('name', 'Nombre o Razon Social', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                             {!! Form::text('name', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                             {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                         </div>
                    </div>


                    <div  class="center" class="form-group {{ $errors->has('identificationcard') ? 'has-error' : ''}}">

                        {!! Form::label('identificationcard', 'N° Identificacion', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-2">
                        {!! Form::select('typeidentificationcard_id', $typeidentificationcards, null, ['class' => 'form-control']) !!}
                                </div> 
                        <div class="col-md-4">
                            {!! Form::text('identificationcard', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                            {!! $errors->first('identificationcard', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                        <div class="form-group">
   
                            </div>

                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                            {!! Form::label('phone', 'N° de Telefono', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::number('phone', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                         </div>
                    </div>
            </div>
        </div>
    </div>

  <div class="col-md-offset-1 col-md-9">
        <div class="panel panel-default">
             <div class="panel-heading">Direccion</div>
                <div class="panel-body">

                    <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Sector</label>

                        <div class="col-md-6">
                            {!! Form::select('sector_id', $sectors, null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>


                    <div class="form-group {{ $errors->has('street') ? 'has-error' : ''}}">
                            {!! Form::label('street', 'Calle', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('street', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                            {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('N°_house') ? 'has-error' : ''}}">
                             {!! Form::label('N°_house', 'N° de Casa', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                              {!! Form::text('N°_house', null, ['class' => 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                             {!! $errors->first('N°_house', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                 </div>
         </div>
    </div>

  <div class="center" class="form-group">
      <div class="col-md-4 col-md-offset-4">
          {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crear', ['class' => 'btn btn-primary']) !!}

          <a href="{{ url('/admin/people') }}" class="btn btn-danger"> Cancelar</a>
      </div>
  </div>
 