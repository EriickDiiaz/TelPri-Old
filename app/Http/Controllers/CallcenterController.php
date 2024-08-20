<?php

namespace App\Http\Controllers;

use App\Models\Callcenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CallcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $conteo = Callcenter::toBase()
        ->selectRaW("count(case when servicio = 'CIC' then 1 end) as CIC")
        ->selectRaW("count(case when servicio = 'CSI' then 1 end) as CSI")
        ->selectRaW("count(case when servicio = 'HCM' then 1 end) as HCM")
        ->selectRaW("count(case when servicio = 'CeCom' then 1 end) as CeCom")
        ->selectRaW("count(case when servicio = 'PROV' then 1 end) as PROV")
        ->selectRaW("count(case when servicio = 'COR' then 1 end) as COR")
        ->selectRaW("count(*) as TotalCallcenter")
                
        ->first();

        $busqueda = $request->busqueda;
        $callcenters = Callcenter::where('extension', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('nombres', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('usuario', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('servicio', 'LIKE', '%'.$busqueda.'%')
                        ->orWhere('acceso', 'LIKE', '%'.$busqueda.'%')
                        ->latest('id')
                        ->paginate(20);
        
        return view('callcenters.index',compact('callcenters','busqueda','conteo'));
    }

    /**
     * Funcion para crear PDF.
     */

    public function pdf()
    {
        $callcenters = Callcenter::paginate();

        $pdf = Pdf::loadView('callcenters.pdf', ['callcenters'=>$callcenters]);
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('callcenters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'extension' =>'required|unique:callcenters|max:4',
            'nombres' =>'max:100',
            'usuario' =>'max:20',
            'contrasena' =>'max:10',
            'servicio' =>'max:15|nullable',
            'acceso' =>'max:30|nullable'
        ]);

        $callcenter = new Callcenter();
        $callcenter->extension = $request->input('extension');
        $callcenter->nombres = $request->input('nombres');
        $callcenter->usuario = $request->input('usuario');
        $callcenter->contrasena = $request->input('contrasena');
        $callcenter->servicio = $request->input('servicio');
        $callcenter->acceso = $request->input('acceso');
        $callcenter->save();

        return redirect ('callcenters')->with('mensaje','Usuario guardado con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Callcenter $callcenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $callcenter = Callcenter::find($id);
        return view('callcenters.edit',['callcenter'=>$callcenter]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'extension' =>'required|max:4|unique:callcenters,extension,'.$id,
            'nombres' =>'max:100',
            'usuario' =>'max:20|unique:callcenters,usuario,'.$id,
            'contrasena' =>'max:10',
            'servicio' =>'max:15|nullable',
            'acceso' =>'max:30|nullable'
        ]);

        $callcenter = Callcenter::find($id);
        $callcenter->extension = $request->input('extension');
        $callcenter->nombres = $request->input('nombres');
        $callcenter->usuario = $request->input('usuario');
        $callcenter->contrasena = $request->input('contrasena');
        $callcenter->servicio = $request->input('servicio');
        $callcenter->acceso = $request->input('acceso');
        $callcenter->save();

        return redirect ('callcenters')->with('mensaje','Usuario actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $callcenter = Callcenter::find($id);
        $callcenter->delete();

        return redirect("callcenters");
    }
}
