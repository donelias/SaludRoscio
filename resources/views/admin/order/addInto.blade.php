@extends('layouts.app')

@section('content')
    <h2>Orden de Entrada</h2>

    <invoice></invoice>

@endsection
@section('bottom')
    <script src="{{asset('components/invoice.tag')}}" type="riot/tag"></script>
    <script>
        $(document).ready(function(){
            riot.mount('invoice');
        })
    </script>
@endsection

