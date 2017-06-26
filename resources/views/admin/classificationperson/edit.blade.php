@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           @include('admin.classificationperson.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Editar Farmaco {{ $classificationperson->classificationperson }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/classificationperson') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($classificationperson, [
                            'method' => 'PATCH',
                            'url' => ['/admin/classificationperson', $classificationperson->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.classificationperson.form', ['submitButtonText' => 'Actualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
