<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el nombre',
        'required',
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('area', 'Área (m2)') !!}
    {!! Form::text('area', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el área',
        'required',
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
