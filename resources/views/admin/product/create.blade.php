@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('js/formValidator/css/formValidation.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-datepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.product.sidebar')

            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">Crear Nuevo Producto</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/product') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a> 

                        {!! Form::open(['url' => '/admin/product', 'class' => 'form-horizontal', 'files' => true, 'id' => 'product-form']) !!}

                        @include ('admin.product.form')
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
    <script src="{{ asset('bootstrap-datepicker/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('bootstrap-datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#product-form').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                locale: 'es_ES',
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor introduce el nombre del producto',
                            }
                        }
                    },
                    measurement_id: {
                        validators: {
                            notEmpty: {}
                        }
                    },
                    grams: {
                        validators: {
                            notEmpty: {},
                            numeric: {
                                thousandsSeparator: '.',
                                decimalSeparator: ','
                            }
                        }
                    },
                    expiration_date: {
                        validators: {
                            notEmpty: {},
                            date: {
                                format: 'DD/MM/YYYY'
                            }
                        }
                    },
                    quantityproduct: {
                        validators: {
                            notEmpty: {},
                            numeric: {
                                thousandsSeparator: '.',
                                decimalSeparator: ','
                            }
                        }
                    },
                    quantityexisting: {
                        validators: {
                            notEmpty: {},
                            numeric: {
                                thousandsSeparator: '.',
                                decimalSeparator: ','
                            }
                        }
                    },
                    photo: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor suba una imagen del producto',
                            },
                            file: {
                                type: 'image/svg+xml,image/png,image/jpeg,image/gif',
                                message: 'El archivo seleccionado no cumple con los formatos aceptados, asegurese de que es una imagen'
                            }
                        }
                    },
                    laboratory_id: {
                        validators: {
                            notEmpty: {}
                        }
                    },
                    typemedicine_id: {
                        validators: {
                            notEmpty: {}
                        }
                    },
                    classification_id: {
                        validators: {
                            notEmpty: {}
                        }
                    },
                    drug_id: {
                        validators: {
                            notEmpty: {}
                        }
                    }
                }
            });
        });

        //Bootstrap-Datepicker
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: "DD/MM/YYYY",
                locale: moment.locale('es'),
                showClose: true,
                showTodayButton: true,
                allowInputToggle: true,
            });
        });
    </script>
@endsection
