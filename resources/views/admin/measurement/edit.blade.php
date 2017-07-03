@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
           @include('admin.measurement.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Editar Farmaco {{ $measurement->measurement }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/measurement') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($measurement, [
                            'method' => 'PATCH',
                            'url' => ['/admin/measurement', $measurement->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.measurement.form', ['submitButtonText' => 'Actualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
