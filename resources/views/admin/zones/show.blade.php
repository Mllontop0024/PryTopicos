@extends('adminlte::page')

@section('title', 'Zona')

@section('content_header')

@stop
@section('content')
    <div class="p-2"></div>
    <div class="card">
        <div class="card-header">
            <h4>Vista de Zona</h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre:') !!} <br>
                        {{ $zone->name }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('area', 'Área (m2):') !!} <br>
                        {{ $zone->area }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Descripción:') !!} <br>
                        {{ $zone->description }}
                    </div>
                </div>
                <div class="col-8 border" id="map2" style="height: 300px">
                </div>
            </div>


        </div>
    </div>
    <div class="card">
        <div class="card-header">

            <button class="btn btn-sm btn-success float-right" id="btnRegistrar" data-id={{ $zone->id }}>
                <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Agregar coordenada
            </button>

            <h5>Coordenadas</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="listados">
                <thead>
                    <th>ID</th>
                    <th>LATITUD</th>
                    <th>LONGITUD</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($zoneCoords as $zoneCoord)
                        <tr>
                            <td>{{ $zoneCoord->id }}</td>
                            <td>{{ $zoneCoord->latitude }}</td>
                            <td>{{ $zoneCoord->longitude }}</td>

                            <td width="20px">
                                <form action="{{ route('admin.zonecoords.destroy', $zoneCoord->id) }}" method="post"
                                    class="eliminacion">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar coordenadas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <!--<div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>-->
            </div>
        </div>
    </div>
@stop
@section('js')

    <script>
        $('#btnRegistrar').click(function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('admin.zonecoords.edit', 'id') }}".replace('id', id),
                type: "GET",
                success: function(response) {
                    $('#Modal .modal-body').html(response);
                    $('#Modal').modal('show');
                }
            })
        });

        $('.eliminacion').submit(function(e) {

            e.preventDefault();

            Swal.fire({
                title: '¿Seguro de eliminar?',
                text: "Este proceso es irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })

        $('#listados').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            },
        })

        @if (session('success') != null)
            Swal.fire(
                'Proceso existoso',
                '{{ session('success') }}',
                'success'
            )
        @endif
    </script>
@endsection
<script>
    function initMap2() {


        // Obtener ubicación actual si los campos están vacíos o no contienen valores numéricos válidos
        navigator.geolocation.getCurrentPosition(function(position) {
            lat = position.coords.latitude;
            lng = position.coords.longitude;

            displayMap2(lat, lng);
        });

    }

    function displayMap2(lat, lng) {
        var mapOptions = {
            center: {
                lat: lat,
                lng: lng
            },
            zoom: 16.5
        };

        var map = new google.maps.Map(document.getElementById('map2'), mapOptions);

        var perimeterCoords = @json($vertice);
        // Crea un objeto de polígono con los puntos del perímetro
        var perimeterPolygon = new google.maps.Polygon({
            paths: perimeterCoords,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35
        });

        perimeterPolygon.setMap(map);

        // Actualizar las coordenadas al mover el marcador
        google.maps.event.addListener(marker, 'dragend', function(event) {
            var latLng = event.latLng;
            latInput.value = latLng.lat();
            lonInput.value = latLng.lng();
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap2" async
    defer></script>
