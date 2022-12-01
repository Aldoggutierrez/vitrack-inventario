@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Equipos'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Editar equipo</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form method="POST" action={{ route('equipos.update',$equipo->id) }}>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        <label for="nombre" class="form-control-label">Nombre</label>
                                        <input type="text" value={{ $equipo->nombre }} name="nombre" class="form-control" id="nombre" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        <label for="marca" class="form-control-label">Marca</label>
                                        <input type="text" value={{ $equipo->marca }} name="marca" class="form-control" id="marca" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        <label for="numero-de-serie" class="form-control-label">Numero de serie</label>
                                        <input type="text" value={{ $equipo->numero_serie }} name="numero_serie" class="form-control" id="numero-de-serie" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        <label for="ubicacion" class="form-control-label">Ubicacion</label>
                                        <select class="form-control" value={{ $equipo->ubicacion->id }} name="ubicacion_id" id="ubicacion">
                                            @foreach ($ubicaciones as $ubicacion)
                                                <option value={{ $ubicacion->id }}>{{ $ubicacion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        <label for="fecha-de-vencimiento-garantia" class="form-control-label">Fecha de vencimiento de la garantia</label>
                                        <input class="form-control" name="fecha_garantia" value={{ $equipo->fecha_garantia }} type="date" id="fecha-de-vencimiento-garantia">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex p-4 align-items-center">
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
