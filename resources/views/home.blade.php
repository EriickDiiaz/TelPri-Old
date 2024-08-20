@extends('layouts.app')
@section('title', 'TelPri Web | Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center py-5">
            <img src="{{URL::asset('Imagenes/Logo_TelPri_2.png')}}" alt="LogoTelPri Web" width="400" class="py-2">
            <h4>Hola, {{ Auth::user()->name }}. Bienvenido a TelPri-Web, el sistema de inventario de Telefonía Privada.</h4>
        </div>

        <h5>Resumen de lineas telefónicas administradas por la unidad.</h5>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Plataforma</th>
                <th>Asignadas</th>
                <th>Disponibles</th>
                <th>Bloqueada</th>
                <th>Por Verificar</th>
                <th>Por Eliminar</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Axe</td>
                <td>{{$conteo->AxeAsi}}</td>
                <td>{{$conteo->AxeDis}}</td>
                <td>{{$conteo->AxeBlo}}</td>
                <td>{{$conteo->AxeVer}}</td>   
                <td>{{$conteo->AxeEli}}</td>
                <th>{{$conteo->TotalAxe}}</th>
            </tr>
            <tr>
                <td>Cisco</td>
                <td>{{$conteo->CiscoAsi}}</td>
                <td>{{$conteo->CiscoDis}}</td>
                <td>{{$conteo->CiscoBlo}}</td>
                <td>{{$conteo->CiscoVer}}</td>
                <td>{{$conteo->CiscoEli}}</td>
                <th>{{$conteo->TotalCisco}}</th>
            </tr>
            <tr>
                <td>Ericsson</td>
                <td>{{$conteo->EricssonAsi}}</td>
                <td>{{$conteo->EricssonDis}}</td>
                <td>{{$conteo->EricssonBlo}}</td>
                <td>{{$conteo->EricssonVer}}</td>
                <td>{{$conteo->EricssonEli}}</td>
                <th>{{$conteo->TotalEricsson}}</th>
            </tr>
            <tr>
                <td>Externos</td>
                <td>{{$conteo->ExternosAsi}}</td>
                <td>{{$conteo->ExternosDis}}</td>
                <td>{{$conteo->ExternosBlo}}</td>
                <td>{{$conteo->ExternosVer}}</td>
                <td>{{$conteo->ExternosEli}}</td>
                <th>{{$conteo->TotalExternos}}</th>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>{{$conteo->TotalAsi}}</th>
                <th>{{$conteo->TotalDis}}</th>
                <th>{{$conteo->TotalBlo}}</th>
                <th>{{$conteo->TotalVer}}</th>
                <th>{{$conteo->TotalEli}}</th>
                <th>{{$conteo->TotalTotal}}</th>
            </tr>
        </tfoot>
        
    </table>
    </div>
</div>
@endsection
