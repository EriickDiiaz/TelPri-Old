<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lineas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $conteo = Lineas::toBase()
        ->selectRaW("count(case when estado = 'Asignada' and plataforma = 'AXE' then 1 end) as AxeAsi")
        ->selectRaW("count(case when estado = 'Disponible' and plataforma = 'AXE' then 1 end) as AxeDis")
        ->selectRaW("count(case when estado = 'Bloqueada' and plataforma = 'AXE' then 1 end) as AxeBlo")
        ->selectRaW("count(case when estado = 'Por Verificar' and plataforma = 'AXE' then 1 end) as AxeVer")
        ->selectRaW("count(case when estado = 'Por Eliminar' and plataforma = 'AXE' then 1 end) as AxeEli")

        ->selectRaW("count(case when estado = 'Asignada' and plataforma = 'Cisco' then 1 end) as CiscoAsi")
        ->selectRaW("count(case when estado = 'Disponible' and plataforma = 'Cisco' then 1 end) as CiscoDis")
        ->selectRaW("count(case when estado = 'Bloqueada' and plataforma = 'Cisco' then 1 end) as CiscoBlo")
        ->selectRaW("count(case when estado = 'Por Verificar' and plataforma = 'Cisco' then 1 end) as CiscoVer")
        ->selectRaW("count(case when estado = 'Por Eliminar' and plataforma = 'Cisco' then 1 end) as CiscoEli")

        ->selectRaW("count(case when estado = 'Asignada' and plataforma = 'Ericsson' then 1 end) as EricssonAsi")
        ->selectRaW("count(case when estado = 'Disponible' and plataforma = 'Ericsson' then 1 end) as EricssonDis")
        ->selectRaW("count(case when estado = 'Bloqueada' and plataforma = 'Ericsson' then 1 end) as EricssonBlo")
        ->selectRaW("count(case when estado = 'Por Verificar' and plataforma = 'Ericsson' then 1 end) as EricssonVer")
        ->selectRaW("count(case when estado = 'Por Eliminar' and plataforma = 'Ericsson' then 1 end) as EricssonEli")

        ->selectRaW("count(case when estado = 'Asignada' and plataforma = 'Externo' then 1 end) as ExternosAsi")
        ->selectRaW("count(case when estado = 'Disponible' and plataforma = 'Externo' then 1 end) as ExternosDis")
        ->selectRaW("count(case when estado = 'Bloqueada' and plataforma = 'Externo' then 1 end) as ExternosBlo")
        ->selectRaW("count(case when estado = 'Por Verificar' and plataforma = 'Externo' then 1 end) as ExternosVer")
        ->selectRaW("count(case when estado = 'Por Eliminar' and plataforma = 'Externo' then 1 end) as ExternosEli")

        ->selectRaW("count(case when estado = 'Asignada' then 1 end) as TotalAsi")
        ->selectRaW("count(case when estado = 'Disponible' then 1 end) as TotalDis")
        ->selectRaW("count(case when estado = 'Bloqueada' then 1 end) as TotalBlo")
        ->selectRaW("count(case when estado = 'Por Verificar' then 1 end) as TotalVer")
        ->selectRaW("count(case when estado = 'Por Eliminar' then 1 end) as TotalEli")

        ->selectRaW("count(case when plataforma = 'AXE' then 1 end) as TotalAxe")
        ->selectRaW("count(case when plataforma = 'Cisco' then 1 end) as TotalCisco")
        ->selectRaW("count(case when plataforma = 'Ericsson' then 1 end) as TotalEricsson")
        ->selectRaW("count(case when plataforma = 'Externos' then 1 end) as TotalExternos")
        ->selectRaW("count(*) as TotalTotal")
                
        ->first();
        return view('home',compact('conteo'));
    }
}
