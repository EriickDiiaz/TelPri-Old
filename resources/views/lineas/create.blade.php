@extends('layouts.app')
@section('title', 'Líneas | Nueva Línea')
@section('content')

<div class="container">
    
    <h2>Creación de Líneas Telefónicas.</h2>

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

    <form action="{{ url('lineas') }}" method="post">
        @csrf

        <div class="mb-3 row">
            <label for="linea" class="col-sm-2 col-form-label">Línea:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="linea" id="linea" value="{{ old('linea') }}" required>
            </div>
        </div>
 
        <div class="mb-3 row">
            <label for="vip" class="col-sm-2 col-form-label">¿Vip?</label>
            <div class="col-sm-5">
                <select name="vip" id="vip" class="form-select">
                    <option value="{{ old('vip') }}">{{ old('vip') }}</option>
                    <option value="">No</option>
                    <option value="Presidente">Presidente</option>
                    <option value="Vice Presidente">Vice Presidente</option>
                    <option value="Gerente General">Gerente General</option>
                    <option value="Asesor">Asesor</option>
                    <option value="Asistente">Asistente</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="plataforma" class="col-sm-2 col-form-label">Plataforma:</label>
            <div class="col-sm-5">
                <select name="plataforma" id="plataforma" class="form-select">
                    <option value="{{ old('plataforma') }}">{{ old('plataforma') }}</option>
                    <option value="">Seleccione</option>
                    <option value="Axe">Axe</option>
                    <option value="Cisco">Cisco</option>
                    <option value="Ericsson">Ericsson</option>
                    <option value="Externo">Externo</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
            <div class="col-sm-5">
                <select name="estado" id="estado" class="form-select">
                    <option value="{{ old('estado') }}">{{ old('estado') }}</option>
                    <option value="">Seleccione</option>
                    <option value="Disponible">Disponible</option>
                    <option value="Asignada">Asignada</option>
                    <option value="Bloqueada">Bloqueada</option>
                    <option value="Por Verificar">Por Verificar</option>
                    <option value="Por Eliminar">Por Eliminar</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inventario" class="col-sm-2 col-form-label">Inventario:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="inventario" id="inventario" value="{{ old('inventario') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="serial" class="col-sm-2 col-form-label">Serial:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="serial" id="serial" value="{{ old('serial') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="mac" class="col-sm-2 col-form-label">Mac/EQ/Li3:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="mac" id="mac" value="{{ old('mac') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="directo" class="col-sm-2 col-form-label">Directo:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="directo" id="directo" value="{{ old('directo') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="campo_id" class="col-sm-2 col-form-label">Ubic/Par/Campo:</label>
            <div class="d-inline col-sm-2">
                <select name="campo_id" id="campo_id" class="form-select">
                    <option value="{{ old('campo_id') }}">{{ old('campo_id') }}</option>
                        @foreach($campos as $campo)
                        <option value="{{ $campo->id }}">{{ $campo->nombre }}</option>
                        @endforeach
                </select>
            </div>
            <label for="par" class="col-sm-1 col-form-label">/P/</label>
            <div class="d-inline col-sm-2">
                <input type="text" class="form-control" name="par" id="par" value="{{ old('par') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="titular" class="col-sm-2 col-form-label">Titular:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="titular" id="titular" value="{{ old('titular') }}">
            </div>
        </div>



        <div class="mb-3 row">
            <label for="localidad_id" class="col-sm-2 col-form-label">Localidad:</label>
            <div class="col-sm-5">
                <select name="localidad_id" id="localidad_id" class="form-select">
                    <option value="{{ old('localidad_id') }}">{{ old('localidad_id') }}</option>
                        @foreach($localidades as $localidad)
                        <option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="piso_id" class="col-sm-2 col-form-label">Piso:</label>
            <div class="col-sm-5">
                <select name="piso_id" id="piso_id" class="form-select">
                    <option value="">Seleccione un Piso</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="observacion" class="col-sm-2 col-form-label">Observaciones:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="observacion" id="observacion" value="{{ old('observacion') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="modificado" class="col-sm-2 col-form-label">Creado por:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="modificado" id="modificado" value="{{ Auth::user()->name }}" readonly>
            </div>
        </div>

        <a href="{{ url('lineas') }}" class="btn btn-danger btn-sm">
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
            Agregar
        </button>
                    
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    type="text/javascript">
$(document).ready(function() {
    $('#localidad_id').change(function() {
        var localidadID = $(this).val();
        if(localidadID) {
            $.ajax({
                url: '{{ url("/get-pisos") }}/' + localidadID,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#piso_id').empty();
                    $('#piso_id').append('<option value="">Seleccione un piso</option>');
                    $.each(data, function(key, value) {
                        $('#piso_id').append('<option value="'+ value.id +'">'+ value.nombre +'</option>');
                    });
                }
            });
        } else {
            $('#piso_id').empty();
            $('#piso_id').append('<option value="">Seleccione un piso</option>');
        }
    });
});
</script>

@endsection