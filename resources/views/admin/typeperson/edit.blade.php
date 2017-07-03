@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          @include('admin.typeperson.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Editar Tipo de Persona {{ $typeperson->typeperson }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/typeperson') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($typeperson, [
                            'method' => 'PATCH',
                            'url' => ['/admin/typeperson', $typeperson->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.typeperson.form', ['submitButtonText' => 'Actualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
