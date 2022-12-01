@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Clientes'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Editar Cliente</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form method="POST" action={{ route('clientes.update',$cliente->id) }}>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="nombre" class="form-control-label">Nombre</label>
                                        <input type="text" value="{{ $cliente->nombre }}" name="nombre" class="form-control" id="nombre" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        @error('apellido')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="apellido" class="form-control-label">Apellido</label>
                                        <input type="text" value="{{ $cliente->apellido }}" name="apellido" class="form-control" id="apellido" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        @error('telefono')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="telefono" class="form-control-label">Telefono</label>
                                        <input class="form-control" value="{{ $cliente->telefono }}" name="telefono" type="number" id="telefono">
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <div class="fecha_garantia">
                                        @error('fecha_nacimiento')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="fecha_nacimiento" class="form-control-label">Fecha de nacimiento</label>
                                        <input type="date" name="fecha_nacimiento" value={{ $cliente->fecha_nacimiento }} class="form-control" id="fecha_nacimiento" placeholder="name@example.com">
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
