<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.paciente.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'run'=>'required|unique:pacientes',
            'fecha_nacimiento'=>'required',
            'genero'=>'required',
            'fono'=>'required',
            'email'=>'required|max:200|unique:pacientes',
            'direccion'=>'required',
            'estado_civil'=>'required',
         ]);
         $pacientes = new Paciente();
         $pacientes->nombres = $request->nombres;
         $pacientes->apellidos = $request->apellidos;
         $pacientes->run = $request->run;
         $pacientes->fecha_nacimiento = $request->fecha_nacimiento;
         $pacientes->genero = $request->genero;
         $pacientes->fono = $request->fono;
         $pacientes->email = $request->email;
         $pacientes->direccion = $request->direccion;
         $pacientes->estado_civil = $request->estado_civil;
         $pacientes->observaciones = $request->observaciones;
         $pacientes->save();
         
         return redirect()->route('admin.paciente.index')
        ->with('mensaje','¡Se ha registrado al paciente de la manera correcta!')
        ->with('icono','success');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.paciente.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.paciente.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $pacientes= Paciente::find($id);
        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'run'=>'required|unique:pacientes,run,'.$pacientes->id,
            'fecha_nacimiento'=>'required',
            'genero'=>'required',
            'fono'=>'required',
            'email'=>'required|max:200|unique:pacientes,email,'.$pacientes->email,
            'direccion'=>'required',
            'estado_civil'=>'required',
         ]);

         $pacientes->nombres = $request->nombres;
         $pacientes->apellidos = $request->apellidos;
         $pacientes->run = $request->run;
         $pacientes->fecha_nacimiento = $request->fecha_nacimiento;
         $pacientes->genero = $request->genero;
         $pacientes->fono = $request->fono;
         $pacientes->email = $request->email;
         $pacientes->direccion = $request->direccion;
         $pacientes->estado_civil = $request->estado_civil;
         $pacientes->observaciones = $request->observaciones;
         $pacientes->save();
         return redirect()->route('admin.paciente.index')
        ->with('mensaje','¡Se ha actualizado al paciente de la manera correcta!')
        ->with('icono','success');
    }
}
