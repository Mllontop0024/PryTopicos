<div class="form-group">
    {!! Form::label('name', 'Nombre Común') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el nombre común',
        'required',
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('cien_name', 'Nombre Científico') !!}
    {!! Form::text('cien_name', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el nombre científico',
        'required',
    ]) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>