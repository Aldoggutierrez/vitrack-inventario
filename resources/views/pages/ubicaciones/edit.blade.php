@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Equipos'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h6>Editar ubicación</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form method="POST" action={{ route('ubicaciones.update',$ubicacion->id) }}>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 p-4">
                                    <div class="form-group">
                                        @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="nombre" class="form-control-label">Nombre</label>
                                        <input type="text" value="{{ $ubicacion->nombre }}" name="nombre" class="form-control" id="nombre" placeholder="name@example.com">
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
