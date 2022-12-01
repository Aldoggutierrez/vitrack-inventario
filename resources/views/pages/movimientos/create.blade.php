@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Movimientos'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Hacer movimiento</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form method="POST" action={{ route('movimientos.store') }}>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        @error('equipo_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="equipo" class="form-control-label">Equipo</label>
                                        <select class="form-control" name="equipo_id" id="equipo">
                                            @foreach ($equipos as $equipo)
                                                <option value={{ $equipo->id }}>{{ $equipo->nombre }} ({{ $equipo->ubicacion->nombre }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        @error('ubicacion_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="ubicacion" class="form-control-label">Ubicacion</label>
                                        <select class="form-control" name="ubicacion_id" id="ubicacion">
                                            @foreach ($ubicaciones as $ubicacion)
                                                <option value={{ $ubicacion->id }}>{{ $ubicacion->nombre }}</option>
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
