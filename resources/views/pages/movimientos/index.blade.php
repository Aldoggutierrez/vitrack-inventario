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
                $('#exampleModalLabel').html(`Eliminar movimiento`);
                $('#cuerpoModal').html(`Seguro que desea eliminar el movimiento?`);
                $('#deleteButton').on('click', function() {
                    var url = "{{ route('movimientos.destroy', [':empid']) }}";
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
    @include('layouts.navbars.auth.topnav', ['title' => 'Movimientos'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Movimientos</h6>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('movimientos.create') }}">Hacer Movimiento</a>
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
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ubicación</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            fecha</th>
                                        <th class="text-secondary opacity-7"></th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimientos as $movimiento)
                                        <tr class="py-4">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ ucfirst($movimiento->equipo->nombre) }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ ucfirst($movimiento->equipo->marca) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $movimiento->ubicacion->nombre }}</span>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{ $movimiento->fecha }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $movimiento->hora }}</span>
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
