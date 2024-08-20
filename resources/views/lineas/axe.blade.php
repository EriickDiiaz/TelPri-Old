@extends('layouts.app')
@section('title', 'TelPri Web | Lineas | Axe')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
            </svg>
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2>Lineas.</h2>
    <div class="d-flex justify-content-between">
    <div class="d-flex">  
        <a href="{{ url('lineas/create') }}" class="btn btn-success me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5"></path>
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"></path>
            </svg>
            Agregar Linea
        </a>
        <a href="{{ url('lineas/pdf') }}" class="btn btn-outline-light" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
            </svg>
        </a>
        <div class="row align-items-center mx-2 ">
            <span class="badge rounded-pill text-bg-primary">AXE: {{$conteo->TotalAxe}}</span>
        </div>
        <div class="row align-items-center mx-2 ">
            <span class="badge rounded-pill text-bg-primary">Cisco: {{$conteo->TotalCisco}}</span>
        </div>
        <div class="row align-items-center mx-2 ">
            <span class="badge rounded-pill text-bg-primary">Ericsson: {{$conteo->TotalEricsson}}</span>
        </div>
    </div>       
     
        <form class="d-flex" role="search" action="{{route('lineas.index')}}" method="get">
        <input class="form-control me-2" type="search" placeholder="Busqueda" aria-label="Search" name="busqueda" value="{{$busqueda}}">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        </div>
    

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Linea</th>
                <th>Mac/Campo/Li3</th>
                <th>Inventario</th>
                <th>Serial</th>
                <th>Plataforma</th>
                <th>Titular</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(count($lineas)<=0)
                <tr>
                    <td colspan="7">                      
                        <div class="alert alert-warning d-flex align-items-center p-2" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                            </svg>
                        <div class="p-2">
                            ¡Uy! No hay nada que mostrar.
                        </div>
                    </div>

                    </td>
                </tr>
            @else
            @foreach ($lineas as $linea)
            <tr>
                <td>{{ $linea->linea }}</td>
                <td>{{ $linea->mac }}</td>
                <td>{{ $linea->inventario }}</td>
                <td>{{ $linea->serial }}</td>
                <td>{{ $linea->plataforma }}</td>   
                <td>{{ $linea->titular }}</td>
                <td>{{ $linea->estado }}</td>
                <td>
                    <!-- Botón Ver -->
                    <a href="{{ url('lineas/'.$linea->id.'show')}}" class="btn btn-light btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                    </a>
                    |
                    <!-- Botón Editar -->
                    <a href="{{ url('lineas/'.$linea->id.'/edit')}}" class="btn btn-primary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                    
                    <!-- Botón Eliminar -->
                    <!--
                    |
                    <form action="{{ url('lineas/'.$linea->id)}}" class="d-inline" method="post">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    -->
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">{{$lineas->appends(['busqueda'=>$busqueda])}}</td>
            </tr>
        </tfoot>
    </table>
    
</div>

@endsection