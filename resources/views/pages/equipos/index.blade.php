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
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        method: 'DELETE',
                        success: function(response) {
                            console.log('equipo borrado');
                            $('#modal').modal('hide');
                        }
                    });
                })
                $('#modal').modal('show');
            }
        });

    });
</script>
@include('components.modal');

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Equipos'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Equipos</h6>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('equipos.create') }}">Agregar equipo</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Equipo</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Numero de serie</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ubicación</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            fecha de vencimiento de garantia</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipos as $equipo)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ ucfirst($equipo->nombre) }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ ucfirst($equipo->marca) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{ $equipo->numero_serie }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $equipo->ubicacion->nombre }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $equipo->fecha_garantia }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="dropdown">
                                                    <a href="#" class="btn bg-gradient-dark dropdown-toggle "
                                                        data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">Acciones</a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href={{ route('equipos.edit', $equipo->id) }}>
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item deleteModal" data-id={{ $equipo->id }}
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
@endsection
