@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Role</div>

                <div class="panel-body">
                    {!! Form::model($reporte, ['route' => ['reportes.update', $reporte->id],
                    'method' => 'PUT','files'=>true]) !!}

                        @include('reportes.formulario.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
