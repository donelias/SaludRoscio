@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             @include('admin.state.sidebar')
             
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Crear Nuevo Estado</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/state') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/state', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.state.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
