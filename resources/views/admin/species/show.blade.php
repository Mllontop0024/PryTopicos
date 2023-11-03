@extends('adminlte::page')

@section('title', 'Mostrar Especie')

@section('content_header')

@stop
@section('content')
    <div class="p-2"></div>
    <div class="card">
        <div class="card-header">
            <h4>Vista de Especie</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'Nombre Común') !!}
                {{ $specie->name }}
            </div>
            <div class="form-group">
                {!! Form::label('cien_name', 'Nombre Científico') !!}
                {{ $specie->cien_name }}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Descripción') !!}
                {{ $specie->description }}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Imágenes</h5>
        </div>
        <div class="card-body">

            <div class="row">
                @foreach ($speciephotos as $photos)
                    <div class="col-2">
                        <div class="card img-thumbnail" style="width: 200px; height: 200px;">
                            <img src="{{ asset($photos->url) }}" alt="" style="width: 100%; height: 100%;">
                        </div>

                        <form action="{{ route('admin.speciephotos.destroy', $photos->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger"><i
                                    class="fas fa-minus-circle"></i></button>
                        </form>

                    </div>
                @endforeach
            </div>


        </div>
        <div class="card-footer">
            <form action="{{ route('admin.speciephotos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $specie->id }}" name="specie_id">
                <input type="file" name="url" accept="image/*">
                <button type="submit" class="btn btn-sm btn-success">Cargar</button>
            </form>
        </div>
    </div>
@stop
