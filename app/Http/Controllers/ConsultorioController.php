<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('admin.consultorio.index ',compact('consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.consultorio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'ubicacion'=>'required',
            'capacidad'=>'required',
            'telefono'=>'required',
            'especialidad'=>'required',
            'estado'=>'required',
         ]);
         Consultorio::create($request->all());
         
         return redirect()->route('admin.consultorio.index')
        ->with('mensaje','¡Se ha registrado al connsultorio de la manera correcta!')
        ->with('icono','success');
    }

    /**
     * Display the specified resource.
    **/
    public function show($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorio.show',compact('consultorio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorio.edit',compact('consultorio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nombre'=>'required',
            'ubicacion'=>'required',
            'capacidad'=>'required',
            'telefono'=>'required',
            'especialidad'=>'required',
            'estado'=>'required',
         ]);

        $consultorio = Consultorio::find($id);   
        $consultorio->update($request->all());
         
         return redirect()->route('admin.consultorio.index')
        ->with('mensaje','¡Se ha actualizado al connsultorio de la manera correcta!')
        ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function confirmDelete($id){
        $consultorio =  Consultorio::findorFail($id);
        return view('admin.consultorio.delete',compact('consultorio'));
    }

    public function delete($id)
    {
        $consultorio = Consultorio::find($id);
        $consultorio->delete();
        return redirect()->route('admin.consultorio.index')
        ->with('mensaje','¡Se ha eliminado al connsultorio de la manera correcta!')
        ->with('icono','success');
    }
}
