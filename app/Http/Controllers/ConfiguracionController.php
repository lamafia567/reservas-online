<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuraciones = Configuracion::all();
        return view('admin.configuracion.index', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.configuracion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'fono' => 'required',
            'correo' => 'required',
            'logo' => 'required',
        ]);

        $configuracion = new Configuracion();

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->fono = $request->fono;
        $configuracion->correo = $request->correo;
        $configuracion->logo = $request->file('logo')->store('logos', 'public');

        $configuracion->save();

        return redirect()->route('admin.configuracion.index')
            ->with('mensaje', '¡Se ha guardado la configuracion de la manera correcta!')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $configuracion = Configuracion::find($id);
        return view('admin.configuracion.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $configuracion = Configuracion::find($id);
        return view('admin.configuracion.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'fono' => 'required',
            'correo' => 'required',
        ]);

        $configuracion = Configuracion::find($id);

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->fono = $request->fono;
        $configuracion->correo = $request->correo;

        if ($request->hasFile('logo')) {
            Storage::delete('public/'.$configuracion->logo);
            $configuracion->logo = $request->file('logo')->store('logos', 'public');
            
        }

        $configuracion->save();

        return redirect()->route('admin.configuracion.index')
            ->with('mensaje', '¡Se ha actualizado la configuracion de la manera correcta!')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function confirmDelete($id){
        $configuracion = Configuracion::find($id);
        return view('admin.configuracion.delete', compact('configuracion'));
    }
    
    public function delete($id)
    {
        $configuracion = Configuracion::find($id);
        Storage::delete('public/'.$configuracion->logo);
        Configuracion::destroy($id);
        return redirect()->route('admin.configuracion.index')
        ->with('mensaje','¡Se ha eliminado a la configuracion de la manera correcta!')
        ->with('icono','success');
    }
}
