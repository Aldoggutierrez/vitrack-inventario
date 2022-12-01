@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function() {
        // let modal = $(".deleteModal")
        // console.log(modal);

        $('#table').on('click', '.deleteModal', function() {
            var id = $(this).attr('data-id');

            if (id > 0) {
                $('.modal-body').html(`<p>${id}</p>`);
                $('#deleteButton').on('click', function() {
                    var url = "{{ route('equipos.destroy', [':empid']) }}";
                    url = url.replace(':empid', id);
                    $('#delete-form').attr('action', url)
                    $('#delete-form').submit()
                })
                $('#modal').modal('show');
            }
        });

    });
</script>

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Ubicaciones'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Ubicaciones</h6>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('ubicaciones.create') }}">Crear Ubicación</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="table">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nombre</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ubicaciones as $ubicacion)
                                        <tr class="py-4">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ ucfirst($ubicacion->nombre) }}</h6>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="dropdown">
                                                    <a href="#" class="btn bg-gradient-dark dropdown-toggle "
                                                        data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">Acciones</a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href={{ route('ubicaciones.edit', $ubicacion->id) }}>
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item deleteModal" data-id={{ $ubicacion->id }}
                                                                href="#">
                                                                Eliminar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.modal');
@endsection
