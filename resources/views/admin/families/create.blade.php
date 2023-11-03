@extends('adminlte::page')

@section('title', 'Nueva familia')

@section('content_header')

@stop

@section('content')
    <div class="p-2"></div>
    <div class="card">
        <div class="card-header">
            <h4>Nueva Familia</h4>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'admin.families.store']) !!}
            @include('admin.families.partials.form')
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;&nbsp;Registrar</button>
            <a href="{{ route('admin.families.index') }}" class="btn btn-danger"><i
                    class="fas fa-backspace"></i>&nbsp;&nbsp;Retornar</a>
            {!! Form::close() !!}
        </div>

    </div>

@stop
