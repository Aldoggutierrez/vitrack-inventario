@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Equipos'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Crear equipo</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form method="POST" action={{ route('eventos.store') }}>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        <label for="nombre" class="form-control-label">Nombre</label>
                                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        <label for="fecha" class="form-control-label">Fecha</label>
                                        <input type="date" name="fecha" value={{ now() }} class="form-control" id="fecha">
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        @error('cliente_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="cliente" class="form-control-label">Cliente</label>
                                        <select class="form-control" name="cliente_id" id="cliente">
                                            @foreach ($clientes as $cliente)
                                                <option value={{ $cliente->id }}>{{ $cliente->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        @error('equipo_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="equipo" class="form-control-label">Equipo</label>
                                        <select class="form-control" name="equipo_id" id="equipo">
                                            @foreach ($equipos as $equipo)
                                                <option value={{ $equipo->id }}>{{ $equipo->nombre }} {{ $equipo->marca }}</option>
                                            @endforeach
                                        </select>
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
