@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Eventos'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Editar evento</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form method="POST" action={{ route('eventos.update',$evento->id) }}>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="nombre" class="form-control-label">Nombre</label>
                                        <input type="text" value="{{ $evento->nombre }}" name="nombre" class="form-control" id="nombre" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="fecha_garantia">
                                        @error('fecha_nacimiento')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="fecha" class="form-control-label">Fecha</label>
                                        <input type="date" name="fecha" value={{ $evento->fecha }} class="form-control" id="fecha" placeholder="name@example.com">
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
                                                @if ($evento->cliente->id == $cliente->id)
                                                    <option selected value={{ $cliente->id }}>{{ $cliente->nombre }}</option>
                                                @else
                                                    <option value={{ $cliente->id }}>{{ $cliente->nombre }}</option>
                                                @endif
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
                                                @if ($evento->equipo->id == $equipo->id)
                                                    <option selected value={{ $equipo->id }}>{{ $equipo->nombre }} ({{ $equipo->marca }})</option>
                                                @else
                                                    <option value={{ $equipo->id }}>{{ $equipo->nombre }} ({{ $equipo->marca }})</option>
                                                @endif
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
