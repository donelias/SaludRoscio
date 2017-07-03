@extends('layouts.app')

@section('content') 
    <div class="container">
        <div class="col-md-10">
            <hr>
            <div class="jumbotron">
                <div class="row panel panel">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        <div class="container" style="border-bottom:1px solid black">
                            <h2>{{ $users->name }}</h2>
                        </div>
                        <hr>
                        <ul class="container details">
                            <li><p><span class="fa fa-user-o" aria-hidden="true" style="width:50px;"></span>{{ $users->user }}</p></li>
                            <li><p><span class="fa fa-user" style="width:50px;"></span>{{ $users->role->role }}</p></li>
    						<li><p><span class="glyphicon glyphicon-envelope" style="width:50px;"></span>{{ $users->email }}</p></li>
                            <li><p><span class="fa fa-calendar" aria-hidden="true" style="width:50px;"></span>{{ $users->created_at }}</p></a>
                            <li><p><span class="fa fa-calendar" aria-hidden="true" style="width:50px;"></span>{{ $users->updated_at }}</p></a>
                        </ul>
                        <a href="{{ route('user') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
						 <a href="{{ url('/admin/edit', $users->id) }}" class="btn btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/> Editar</a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/delete-usuario', $users->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar" /> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Eliminar',
                                                        'onclick'=>'return confirm("esta seguro que desea eliminar el usuario?")'
                                                )) !!}
                                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
