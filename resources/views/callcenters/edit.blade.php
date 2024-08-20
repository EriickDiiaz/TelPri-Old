@extends('layouts.app')
@section('title', 'CallCenters | Editar Usuario')
@section('content')

<div class="container">
        <h2>Edición de Usuarios CallCenter.</h2>

        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Uy!</strong> Revisa los siguientes errores antes de continuar.
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ url('callcenters/' .$callcenter->id) }}" method="post">
            @method("PUT")
            @csrf

            <div class="mb-3 row">
                <label for="extension" class="col-sm-2 col-form-label">Extensión:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="extension" id="extension" value="{{ $callcenter->extension }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombres" class="col-sm-2 col-form-label">Nombre y Apellido:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombres" id="nombres" value="{{ $callcenter->nombres }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="usuario" class="col-sm-2 col-form-label">Usuario:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="usuario" id="usuario" value="{{ $callcenter->usuario }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="contrasena" class="col-sm-2 col-form-label">Contraseña:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="contrasena" id="contrasena" value="{{ $callcenter->contrasena }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="servicio" class="col-sm-2 col-form-label">Servicio:</label>
                <div class="col-sm-5">
                    <select name="servicio" id="servicio" class="form-select">
                        <option value="{{ $callcenter->servicio }}">{{ $callcenter->servicio }}</option>
                        <option value="">Seleccione</option>
                        <option value="CIC">CIC</option>
                        <option value="CSI">CSI</option>
                        <option value="HCM">HCM</option>
                        <option value="CeCom">CeCom</option>
                        <option value="PROV">Provisioning</option>
                        <option value="COR">COR</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="acceso" class="col-sm-2 col-form-label">Acceso:</label>
                <div class="col-sm-5">
                    <select name="acceso" id="acceso" class="form-select">
                        <option value="{{ $callcenter->acceso }}">{{ $callcenter->acceso }}</option>   
                        <option value="">Seleccione</option>
                        <option value="Agent">Agent</option>
                        <option value="Agent/Superv">Agent/Superv</option>
                        <option value="Agent/Superv/Report">Agent/Superv/Report</option>
                        </select>
                </div>
            </div>

            <a href="{{ url('callcenters') }}" class="btn btn-danger btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>  
            </svg>
                Regresar
            </a>

            <button type="submit" class="btn btn-success btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"></path>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"></path>
                </svg>
                Actualizar
            </button>
                        
        </form>

</div>

@endsection