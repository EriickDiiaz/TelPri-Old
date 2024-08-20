@extends('layouts.app')
@section('title', 'TelPri Web | Lineas')
@section('content')
<div class="container">

<form action="{{ url('lineas/' .$linea->id) }}" method="post">
@method("PUT")
@csrf

<h2><li class="list-group-item"><strong>Línea:</strong> {{ $linea->linea }}</li></h2>
@if ($linea->vip !="")
    <h4 class="list-group-item"><strong>Vip:</strong> {{ $linea->vip }}</h4>
@endif

<div class="mb-3 row">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Cod. Inv.:</strong> {{ $linea->inventario }}</li>
        <li class="list-group-item"><strong>Serial:</strong> {{ $linea->serial }}</li>
        <li class="list-group-item"><strong>Plataforma:</strong> {{ $linea->plataforma }}</li>
        <li class="list-group-item"><strong>Estado:</strong> {{ $linea->estado }}</li>
        <li class="list-group-item"><strong>Mac/Campo/Li3:</strong> {{ $linea->mac }}</li>
        <li class="list-group-item"><strong>Directo:</strong> {{ $linea->directo }}</li>
        <li class="list-group-item"><strong>Ubic/Par/Campo:</strong>
            {{ $linea->campo->nombre ?? 'N/A' }}
            @if(!empty($linea->campo) && !empty($linea->par)) /P/ @endif
            {{ $linea->par ?? 'N/A' }}
        </li>
        <li class="list-group-item"><strong>Titular:</strong> {{ $linea->titular }}</li>
        <li class="list-group-item"><strong>Localidad:</strong>{{ $linea->localidad->nombre ?? 'N/A'}}</li>
        <li class="list-group-item"><strong>Piso:</strong>{{ $linea->piso->nombre ?? 'N/A'}}</li>
        <li class="list-group-item"><strong>Observación:</strong> {{ $linea->observacion }}</li>
        <li class="list-group-item"><strong>Ultima modificación:</strong> {{ $linea->modificado }} {{ $linea->updated_at }}</li>
    </ul>
</div>

            <a href="{{ url('lineas') }}" class="btn btn-danger btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>  
            </svg>
                Regresar
            </a>

            <a href="{{ url('lineas/'.$linea->id.'/edit')}}" class="btn btn-primary btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
                Editar
            </a>
                        
        </form>

</div>
@endsection