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
                $('#exampleModalLabel').html(`Eliminar evento`);
                $('#cuerpoModal').html(`Seguro que desea eliminar el evento?`);
                $('#deleteButton').on('click', function() {
                    var url = "{{ route('eventos.destroy', [':empid']) }}";
                    url = url.replace(':empid', id);
                    $('#delete-form').attr('action',url)
                    $('#delete-form').submit()
                })
                $('#modal').modal('show');
            }
        });

    });
</script>

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Eventos'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Eventos</h6>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('eventos.create') }}">Crear Evento</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nombre</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Equipo</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Cliente</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            fecha</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eventos as $evento)
                                        <tr class="py-4">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ ucfirst($evento->nombre) }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ ucfirst($evento->equipo->nombre) }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs text-secondary mb-0">{{ $evento->cliente->nombre }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $evento->fecha }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="dropdown">
                                                    <a href="#" class="btn bg-gradient-dark dropdown-toggle "
                                                        data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">Acciones</a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href={{ route('eventos.edit', $evento->id) }}>
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item deleteModal" data-id={{ $evento->id }}
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
