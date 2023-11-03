<div class="form-row">
    <div class="form-group col-6">
        {!! Form::label('name', 'Nombre de Árbol') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre', 'required']) !!}
    </div>
    <div class="form-group col-6">
        {!! Form::label('zones', 'Zona') !!}
        {!! Form::select('zone_id', $zones, null, ['class' => 'form-control', 'required']) !!}
    </div>
</div>

<div class="form-row">
    <div class="form-group col-6">
        {!! Form::label('family_id', 'Familia') !!}
        {!! Form::select('family_id', $families, null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group col-6">
        {!! Form::label('specie_id', 'Especie') !!}
        {!! Form::select('specie_id', $species, null, ['class' => 'form-control', 'required']) !!}
    </div>
</div>

<script>
    $('#family_id').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('admin.species_family', 'id') }}".replace('id', id),
            type: "GET",
            dataType: "json",
            success: function(response) {
                $('#specie_id').empty();

                $.each(response, function(key, value) {
                    $('#specie_id').append('<option value="' + value.id + '">' + value
                        .name + '</option>')
                })
            }
        })
    })
</script>
