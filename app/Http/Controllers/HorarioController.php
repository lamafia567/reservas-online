<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with('doctor','consultorio')->get();
        $consultorios = Consultorio::all();
        return view('admin.horario.index',compact('horarios','consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('admin.horario.create',compact('doctores','consultorios','horarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia'=>'required',
            'hora_inicio'=>'required|date_format:H:i',
            'hora_fin'=>'required|date_format:H:i|after:hora_inicio',
            'consultorio_id'=>'required|exists:consultorios,id',
        ]);

        $horarioExistente = Horario::where('dia',$request->dia)
        ->where('consultorio_id',$request->consultorio_id)
        ->where(function ($query) use ($request){
            $query->where(function ($query) use ($request){
                $query->where('hora_inicio','>=',$request->hora_inicio)
                ->where('hora_inicio','<',$request->hora_fin);
            })
            ->orWhere(function ($query) use ($request){
                $query->where('hora_fin','>',$request->hora_inicio)
                ->where('hora_fin','<=',$request->hora_fin);
            })
            ->orWhere(function ($query) use ($request){
                $query->where('hora_inicio','<',$request->hora_inicio)
                ->where('hora_fin','>',$request->hora_fin);
            });
        })
        ->exists();
        if($horarioExistente){
            return redirect()->back()
            ->withInput()
            ->with('mensaje','Ya existe un registro de horario en la hora indicada que se superpone a este horario.')
            ->with('icono','error');
        }

        Horario::create($request->all());

        return redirect()->route('admin.horario.index')
        ->with('mensaje','¡Se ha registrado a la secreraria de la manera correcta!')
        ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::findOrFail($id);
        return view('admin.horario.show',compact('horario'));
    }

    public function cargarConsultorios($id){
        try{
            $horarios = Horario::with('doctor','consultorio')->where('consultorio_id',$id)->get();
            return view('admin.horario.cargarConsultorios',compact('horarios'));
        }catch(\Exception $exception){
            return response()->json(['mensaje'=>'Error']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

     public function confirmDelete($id){
        $horario = Horario::findorFail($id);
        return view('admin.horario.delete',compact('horario'));
    }
    
    public function delete($id)
    {
        Horario::destroy($id);
        return redirect()->route('admin.horario.index')
        ->with('mensaje','¡Se ha eliminado al horario de la manera correcta!')
        ->with('icono','success');
    }
}