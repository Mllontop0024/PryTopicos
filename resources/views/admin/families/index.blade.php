@extends('adminlte::page')

@section('title', 'Familias')

@section('content_header')

@stop

@section('content')
    <div class="p-2"></div>
    <div class="card">
        <div class="card-header">
            <!--<button class="btn btn-success float-right"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Registrar</button>-->
            <a href="{{ route('admin.families.create') }}" class="btn btn-success float-right"><i
                    class="fas fa-plus-circle"></i>&nbsp;&nbsp;Registrar</a>
            <h4>Listado de Familias</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="listados">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE COMÚN</th>
                    <th>NOMBRE CIENTÍFICO</th>
                    <th>DESCRIPCIÓN</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($families as $family)
                        <tr>
                            <td>{{ $family->id }}</td>
                            <td>{{ $family->name }}</td>
                            <td>{{ $family->cien_name }}</td>
                            <td>{{ $family->description }}</td>
                            <td width="20px"><a href="{{ route('admin.families.edit', $family) }}"
                                    class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a></td>
                            <td width="20px">
                                <form action="{{ route('admin.families.destroy', $family->id) }}" method="post"
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
@stop

@section('js')

    <script>
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
