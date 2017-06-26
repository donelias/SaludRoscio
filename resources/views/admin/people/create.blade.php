@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
             @include('admin.people.sidebar')
            
            <div class="col-md-9">
                 <a href="{{ url('/admin/people') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                <div class="panel panel-info">

                    <div class="panel-heading">Crear Nueva Persona</div>
                    <div class="panel-body">
                    

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/people', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.people.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
