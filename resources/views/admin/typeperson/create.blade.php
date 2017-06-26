@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             @include('admin.typeperson.sidebar')
             
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Crear Tipo de Persona</div>
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

                        {!! Form::open(['url' => '/admin/typeperson', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.typeperson.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
