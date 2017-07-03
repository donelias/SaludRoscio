@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('js/formValidator/css/formValidation.min.css') }}">
@endsection

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

                        {!! Form::open(['url' => '/admin/people', 'class' => 'form-horizontal', 'files' => true, 'id' => 'people-form']) !!}

                        @include ('admin.people.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/formValidator/js/formValidation.min.js') }}"></script>
    <script src="{{ asset('js/formValidator/js/framework/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/formValidator/js/language/es_ES.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#people-form').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                locale: 'es_ES',
                fields: {
                    typeperson_id: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor seleccione el Tipo de Persona',
                            }
                        }
                    },
                    classificationperson_id: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor seleccione la clasificacion de la persona',
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese el Nombre o Razon Social',
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese un numero de telefono',
                            },
                            numeric: {
                                message: 'El número telefonico no debe llevar ningun caracter especial, solo numeros.'
                            }
                        }
                    },
                    typeidentificationcard_id: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor seleccione el tipo de identificación',
                            }
                        }
                    },
                    identificationcard: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese su identificación',
                            }
                        }
                    },
                    sector_id: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor seleccione un sector',
                            }
                        }
                    },
                    street: {
                        validators: {
                            notEmpty: {
                                message: 'Ingrese el nombre de la calle',
                            }
                        }
                    },
                    'N°_house': {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese el número de la casa',
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection